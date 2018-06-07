0. 注意事项：
    + 要完全的使用ajax写代码所有的超链接不要给href值，要通过点击的时候通过js请求数据进行改变数据，否则页面会有白屏和刷新
    + 我们这个例子在全程操作的过程中，并没有发生页面的跳转，只有局部更新

    + 提前要铺垫的知识点 - 自定义属性的值的获取

1. 打开数据库 --> 打开mybase数据库 --> 新建查询 --> 导入如下SQL语句 --> 执行 --> 刷新表

```sql
/*
Navicat MySQL Data Transfer

Source Server         : itcast
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : test

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2018-08-31 17:02:27
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for teacher
-- ----------------------------
DROP TABLE IF EXISTS `teacher`;
CREATE TABLE `teacher` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(500) DEFAULT NULL,
  `password` varchar(500) DEFAULT NULL,
  `name` varchar(500) DEFAULT NULL,
  `school` varchar(50) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=85 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of teacher
-- ----------------------------
INSERT INTO `teacher` VALUES ('1', 'jack', '123', '杰克', '传智播客', '19');
INSERT INTO `teacher` VALUES ('2', 'rose', '321', '罗丝', '黑马程序员', '19');
INSERT INTO `teacher` VALUES ('3', 'tom', '123', '汤姆', '传智播客', '19');
INSERT INTO `teacher` VALUES ('4', '张三', '321', '三哥', '黑马程序员', '19');
```

2. 首页动态生成(1.html) 11-学生管理系统-首页动态数据的展示.avi
    --> 这块可以先做出来，然后观察发现id有问题，是倒序的，怎么解决 --> 看视频

```js
$(function () {
    $.ajax({
        type: "get",
        url: "./findUsers.php",
        data: {
            pageNum: 1,
            pageSize: 10
        },
        dataType: "json",
        success: function (result) {
            console.log(result);
            var html = template('dataList', result);
            $('tbody').html(html);
        }
    });
});
```

```html
<script type="text/template" id="dataList">
    <%for(var i = 0;i< list.length;i++){%>
        <tr>
            <td><%=(pageNum -1) * pageSize + i + 1%></td>
            <td><%=list[i].name%></td>
            <td><%=list[i].age%></td>
            <td><%=list[i].username%></td>
            <td><%=list[i].school%></td>
            <td><a href="javascript:;" data-id="<%=list[i].id%>" class="delete" title="删除"><span class="glyphicon glyphicon-remove"></span></a></td>
        </tr>
    <%}%>
</script>
```

id为何要这样写的分析：
第一页 1 2 3 4 5 | 1 = (1 - 0) * 5 + 1
第二页 6 7 8 9 10 | 6 = (2 - 1) * 5 + 1
第三页 11 12 13 14 15 | 11 = (3 - 1) * 5 + 1

---> (pageNum - 1) * pageSize + 1

4. 渲染分页结构块(2.html) 12-学生管理系统-渲染分页结构块.avi 

```html
<script type="text/template" id="pageTemp">
    <li>
        <!--如果是第一页则禁用-->
        <a class="prev <%=pageNum==1?'disabled':''%>" href="javascript:void(0)" aria-label="Previous" data-page="<%=pageNum - 1%>">
            <span aria-hidden="true">&laquo;</span>
        </a>
    </li>
    <li><a class='control curr' href="javascript:void(0)"><%=pageNum%></a></li>
    <li><a class='control' href="javascript:void(0)">/</a></li>
    <li><a class='control total' href="javascript:void(0)"><%=totalPage%></a></li>
    <li>
        <a class="next <%=pageNum==totalPage?'disabled':''%>" href="javascript:void(0)" aria-label="Next" data-page="<%=pageNum + 1%>">
            <span aria-hidden="true">&raquo;</span>
        </a>
    </li>
</script>
```

```js
//渲染分页结构
var pageHtml = template('pageTemp', { 'pageNum': result.pageNum, 'totalPage': Math.ceil(result.total / result.pageSize) });
$(".pagination").html(pageHtml);
```

分析：
1. 把2.html的pageNum,pageSize修改一下试一下效果(把pageNum改成2,把pageSize改成2试一下)
2. 如果是第一页，则禁用样式，如果是最后一页，则禁用样式


5. 分页功能
分析：
1. 尝试给.prev添加事件(见3.html) --> 测试无效 --> 思考为什么无效
2. 事件委托
3. 看视频 --> 4.html

6. 新增功能(5.html)

7. 删除功能(6.html)
分析： --> 事件委托


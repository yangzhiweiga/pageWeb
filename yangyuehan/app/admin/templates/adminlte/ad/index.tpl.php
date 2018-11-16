<?php
/**
 * Created by PhpStorm.
 * User: yangzhiwei
 * Date: 2018/8/26
 * Time: 7:55
 */
?>
<table class="table border" style="border:1px solid #ccc">
    <thead>
    <tr>
        <th>产品</th>
        <th>位置</th>
        <th>图片</th>
        <th>状态</th>
        <th>操作</th>
    </tr>
    </thead>
    <tbody>
    <?php if (!empty($data['list'])): ?>
        <?php foreach ($data['list'] as $ad): ?>
            <tr class="active">
                <td><?= $ad['ad_name'] ?></td>
                <td><?= $this->getPosition($ad['position']); ?></td>
                <td><?= $ad['image']; ?></td>
                <td><?= $ad['status'] == 1 ? '显示' : '隐藏'; ?></td>
                <td>
                    <a href="#" class="btn btn-info btn-sm">
                        <span class="glyphicon glyphicon-pencil"></span>
                    </a>
                    <a href="#" class="btn btn-info btn-sm">
                        <span class="glyphicon glyphicon-trash"></span>
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="3">暂无数据</td>
        </tr>
    <?php endif; ?>
    </tbody>
</table>
<div class="pagination">
    <li><a href="#">&laquo;</a></li>
    <li><a href="#">1</a></li>
    <li><a href="#">2</a></li>
    <li><a href="#">3</a></li>
    <li><a href="#">4</a></li>
    <li><a href="#">5</a></li>
    <li><a href="#">&raquo;</a></li>
</div>

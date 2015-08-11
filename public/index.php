<?php 
require_once "../template/bootstrap.php";
 ?>
<html>
<body>
    

        <table class=" col-md-4 container  table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Item</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Image</th>
                </tr>
            </thead>
            <tbody>
            <!-- set foreach loop to display information in human friendly manner -->
                <?php foreach ($items as $item) : ?>

                    <tr>
                        <td><?=$item['name']; ?></td>
                        <td><?=$item['description']; ?></td> 
                        <td><?=$item['price']; ?></td>
                        <td><?=$item['image_url'] ; ?></td>
                    </tr>
                <? endforeach; ?>
            </tbody>
        </table>
</body>
</html>
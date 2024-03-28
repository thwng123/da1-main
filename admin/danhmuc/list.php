<div class="container pt-4" style="width: 80%">
        <h1 class="d-flex justify-content-center ">Danh Mục</h1>
        <div >
          <button class="btn btn-success"><i class="fa-solid fa-plus" ></i><a href="index.php?act=adddm" style="color:white; text-decoration: none;">Tạo mới</a></button>
        </div>
        <table class="table table-hover table-bordered  mt-3 table-striped container ">
          <thead>
            <tr>
              <th>ID</th>
              <th >Họ Tên</th>
              <th>Tương tác</th>
            </tr>
          </thead>
          <tbody>
            
         
            
            <?php
            foreach($listdm as $item){
              extract($item);
              $suadm="index.php?act=suadm&id=".$cate_id;
              $xoadm="index.php?act=xoadm&id=".$cate_id;

            
            
            
            ?>
               <tr>
                <td><?php echo $item['cate_id']?></td>
                <td><?php echo $item['cate_name']?></td>
              </td>
              <td>
                <button class="btn btn-sm btn-warning"><i class="fa-solid fa-pen-to-square"></i><a href="<?= $suadm?>" style="color:white; text-decoration: none;">Sửa</a></button>
                <button class="btn btn-sm btn-danger " data-bs-toggle="modal" data-bs-target="#myModal">
                  <i class="fa-solid fa-trash"></i><a style="color:white; text-decoration: none;" href="<?=$xoadm?>">Xóa</a></button>
                 
              </td>
            </tr>
            <?php
            }
            ?>
            
            
            
          </tbody>
        </table>
      </div>
    </div>
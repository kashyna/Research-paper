<?php defined ('ISHOP') or die ('Access denied');?>
		<div class="content">
<?php //print_arr($cat)?>	
<h2>Добавление товара:</h2>
<?php 
if(isset($_SESSION['add_product']['res'])){
    echo $_SESSION['add_product']['res']; //выводим результат
   // unset($_SESSION['add_product']['res']);
}
//print_arr($cat);
?>	

<form action="" method="post" enctype="multipart/form-data" >
    <table class="add_edit_page" cellspacing="0" cellpadding="0">
        <tr>
            <td class="add-edit-txt">Название товара</td></td>
            <td><input class="head-text" type="text" name="name" /></td>
        </tr>
        <tr>
            <td class="add-edit-txt">Цена:</td>
            <td><input class="head-text" type="text" name="price" value="<?=$_SESSION['add_product']['price']?>" /></td>
        </tr>        
        <tr>
            <td class="add-edit-txt">Ключевые слова:</td>
            <td><input class="head-text" type="text" name="keywords" value="<?=$_SESSION['add_product']['keywords']?>" /></td>
        </tr>        
        <tr>
            <td class="add-edit-txt">Описание:</td>
            <td><input class="head-text" type="text" name="description" value="<?=$_SESSION['add_product']['description']?>"/></td>
        </tr>
        <tr>
            <td>Родительская категория</td>
            <td>
                <select class="select-inf" name="category" multiple="" size="10" style="height: auto;">
                    <?php foreach($cat as $key_parent => $item):?>
                    <!--проверяем из какой категории мы сюда пришли-->
                        <?php if(count($item) > 1): //если это родительская категория ?>
                        <option disabled=""><?=$item[0]?></option>
                        <?php $i = 0; ?>
                        <?php foreach($item['sub'] as $key => $sub): // цикл дочерних категорий?>                           
                            <option <?php if($key == $brand_id OR $key_parent == $brand_id AND $i == 0){echo "selected"; $i=1;} ?> value="<?=$key?>">&nbsp;&nbsp;-&nbsp;<?=$sub?></option>  
                        <?php endforeach; //конец цикла дочерних категория?>
                        <?php elseif($item[0]): //если это самостоятельная категория ?>
                            <option <?php if($key_parent == $brand_id) echo"selected" ?> value="<?=$key_parent?>"><?=$item[0]?></option>
                        <?php endif; //конец условия родительская категория ?>                        
                    <?php endforeach; ?>
                <!--<option value="1"></option> -->
                </select>
            </td>
        </tr>
        <tr>
            <td>Фото товара:</td>
            <td><input type="file" name="baseimg" /></td>       
        </tr>
        <tr>
            <td>Краткое описание товара:</td>
            <td></td>
        </tr>
        <tr>
             <td colspan="2">
             <textarea id="editor1" class="anons-text" name="anons"><?=$_SESSION['add_product']['anons']?></textarea>
             <script type="text/javascript">
                CKEDITOR.replace( 'editor1' );
             </script>
             </td>
        </tr>
        <tr>
            <td colspan="2">Подробное описание товара:</td>
        </tr>
        <tr>
             <td colspan="2">
             <textarea id="editor2" class="anons-text" name="content"><?=$_SESSION['add_product']['content']?></textarea>
             <script type="text/javascript">
                CKEDITOR.replace( 'editor2' );
             </script>
             </td>
        </tr>
        <tr>
            <td>Фото галереи:</td>
            <td></td>
        </tr>
      <tr>
        <td id="btnimg">
            <div><input type="file" name="galleryimg[]" /></div>
        </td>
      </tr>
      <tr>
        <td>
            <input type="button" id="add" value="Добавить поле" />
            <input type="button" id="del" value="Удалить поле" />
        </td>
      </tr>
        <tr>
            <td>Отметить как:</td>
            <td>
                <input type="checkbox" name="new" value="1" />Новинки<br />
                <input type="checkbox" name="leader" value="1" />Лидеры продаж<br />
                <input type="checkbox" name="sale" value="1" />Скидки<br />
            </td>        
        </tr>
        <tr>
            <td>Отображать:</td>
            <td>
                <input type="radio" name="visible" value="1" checked="" />Да<br />
                <input type="radio" name="visible" value="0" checked="" />Нет
            </td>        
        </tr>
    </table>
    
    <input type="image" src="<?=ADMIN_TEMPLATE?>img/save_btn.jpg" />
</form>

<?php unset($_SESSION['add_product']); ?>
</div> <!-- .content -->
</div> <!-- .content-main -->
</div> <!-- .karkas -->
</body>
</html>
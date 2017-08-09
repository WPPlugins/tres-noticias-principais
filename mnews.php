<?php
/*
Plugin Name: Notícias Principais
Plugin URI: http://www.portalduff.com/
Description: Edi&ccedil;&atilde;o das notícias principais em modelo javascript (3 imagens)
Author: Mário Cecchi
Version: 0.3
Author URI: http://www.meriw.com/
*/


function mnews_display() {
?>
<style type="text/css">
#newWrapper { width: 452px; height:303px; overflow:hidden; background-position: center; background-color: #fff; cursor:pointer; }
#newDate { position: relative; left: 9px; top:9px; width:101px; background:url('http://portalduff.com/wp/wp-content/themes/pd-3/images/images/branco82.png');text-align:center; padding:5px 2px 5px 2px; z-index:999; }
#newText { position: relative; top:223px; width:452px; height: 56px; background:url('http://portalduff.com/wp/wp-content/themes/pd-3/images/images/branco82.png');text-align:left; z-index:999; }
#newText p { padding:15px 10px 12px 10px; }
#newLink { font: 11px georgia; }
</style>
<a href="#" id="newLink">
<div id="newWrapper">
<div id="newDate"></div>
<div id="newText"><p></p></div>
</div></a>
<script language="javascript">
function getObject(obj) {
  var theObj;
  if(document.all) {
    if(typeof obj=="string") {
      return document.all(obj);
    } else {
      return obj.style;
    }
  }
  if(document.getElementById) {
    if(typeof obj=="string") {
      return document.getElementById(obj);
    } else {
      return obj.style;
    }
  }
  return null;
}

function rotatenews(imagem,texto,data,urllink) {
new Effect.Appear('newWrapper');
var newWrapper = getObject('newWrapper');
var newDate = getObject('newDate');
var newText = getObject('newText');
var newLink = getObject('newLink');

newWrapper.style.backgroundImage = "url("+imagem+")";

newDate.innerHTML = data;
newText.innerHTML = texto;
newLink.href = urllink;
}

function trocar() {
num = 0;
rotatenews('<?=get_option('foto1_img')?>','<p><?=get_option('foto1_title')?></p>','<?=get_option('foto1_date')?>','<?=get_option('foto1_link')?>'); 
var troca2 = window.setTimeout("rotatenews('<?=get_option('foto2_img')?>','<p><?=get_option('foto2_title')?></p>','<?=get_option('foto2_date')?>','<?=get_option('foto2_link')?>')",5000);
var troca3 = window.setTimeout("rotatenews('<?=get_option('foto3_img')?>','<p><?=get_option('foto3_title')?></p>','<?=get_option('foto3_date')?>','<?=get_option('foto3_link')?>')",10000);
}

trocar();
var play = window.setInterval("trocar()",15000);

</script>
<?
}


function mnews_editar() {
if ($_POST['mnews_set']) {
	update_option("foto1_img",$_POST['foto1_img']);
	update_option("foto2_img",$_POST['foto2_img']);
	update_option("foto3_img",$_POST['foto3_img']);
	update_option("foto1_title",$_POST['foto1_title']);
	update_option("foto2_title",$_POST['foto2_title']);
	update_option("foto3_title",$_POST['foto3_title']);
	update_option("foto1_date",$_POST['foto1_date']);
	update_option("foto2_date",$_POST['foto2_date']);
	update_option("foto3_date",$_POST['foto3_date']);
	update_option("foto1_link",$_POST['foto1_link']);
	update_option("foto2_link",$_POST['foto2_link']);
	update_option("foto3_link",$_POST['foto3_link']);
}
?>
<div class="wrap">
<h2>Notícias principais</h2>
<br style="clear" />
Escolha aqui as imagens e notícias principais que deseja exibir.  A imagem dever&aacute; ter 452x303 ou ser&aacute; cortada. Faça upload abaixo e copie o endereço da imagem. Use o código <code>&lt;?php if(function_exists('mnews_display')){mnews_display();} ?&gt;</code> para exibir as notícias no seu tema.<br>
<br>
<iframe id="uploading" name="uploading" style="border:2px solid #ccc;" src="media-upload.php?style=inline" width="100%" height="150" border="0"></iframe>
<br><br>
<form method="post">
<input type="hidden" name="mnews_set" value="1" />

<table class="form-table">
<tfoot>
<tr>
<th>Not&iacute;cia #1 </th>
<td width="210" align="left" valign="top">
<input name="foto1_img" type="text" id="foto1_img" value="<?= get_option("foto1_img") ?>" style="width:200px;" />
<br /> 
URL da imagem
<input name="foto1_link" type="text" id="foto1_link" value="<?= get_option("foto1_link") ?>" style="width:200px;" />
<br />
URL do link</td>
<td width="310" align="left" valign="top">
<textarea name="foto1_title" id="foto1_title" style="width:300px;height:62px"><?= get_option("foto1_title") ?>
</textarea>
<br /> 
Legenda da foto</td>
<td width="120" align="left" valign="top"><input name="foto1_date" type="text" id="foto1_date" value="<?= get_option("foto1_date") ?>" style="width:110px;" />
  <br />
  Data</td>
  <td></td>
</tr>
<tr>
<th width="100">Not&iacute;cia #2 </th>
<td align="left" valign="top">
<input name="foto2_img" type="text" id="foto2_img" value="<?= get_option("foto2_img") ?>" style="width:200px;" />
<br />
URL da imagem
<br />
<input name="foto2_link" type="text" id="foto2_link" value="<?= get_option("foto2_link") ?>" style="width:200px;" />
<br />
URL do link&nbsp; </td>
<td align="left" valign="top">
<textarea name="foto2_title" id="foto2_title" style="width:300px;height:62px"><?= get_option("foto2_title") ?>
</textarea>
<br />
Legenda da foto </td>
<td align="left" valign="top"><input name="foto2_date" type="text" id="foto2_date" value="<?= get_option("foto2_date") ?>" style="width:110px;" />
  <br />
  Data</td>
  <td></td>
</tr>
<tr>
<th width="100">Not&iacute;cia #3 </th>
<td align="left" valign="top">
<input name="foto3_img" type="text" id="foto3_img" value="<?= get_option("foto3_img") ?>" style="width:200px;" />
<br />
URL da imagem<br />
<input name="foto3_link" type="text" id="foto3_link" value="<?= get_option("foto3_link") ?>" style="width:200px;" />
<br />
URL do link </td>
<td align="left" valign="top"><textarea name="foto3_title" id="foto3_title" style="width:300px;height:62px"><?= get_option("foto3_title") ?>
</textarea>
  <br />
  Legenda da foto </td>
<td align="left" valign="top"><input name="foto3_date" type="text" id="foto3_date" value="<?= get_option("foto3_date") ?>" style="width:110px;" />
  <br />
  Data</td>
  <td></td>
</tr>
</tfoot>
</table>
<br />
<input type="submit" value="Atualizar fotos" class="button" />
</form>
</div>
<?
}

function mnews_create_menus() {
add_submenu_page('plugins.php', "Editar notícias principais","Notícias principais", 'manage_options', 'noticiasprincipais', 'mnews_editar');
}

add_action('admin_menu', 'mnews_create_menus');

?>
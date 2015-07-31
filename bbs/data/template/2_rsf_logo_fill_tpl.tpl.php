<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); ?><?php
$return = <<<EOF


EOF;
 if($this->open ==1) { 
$return .= <<<EOF

<style type="text/css">
#fastposteditor{
position:relative;
}
#fastposteditor .tedt{
position:relative;
z-index:1;
}
#fastposteditor .tedt .area{
background:none;
}
#fastposteditor .tedt .pt{
background:none;
}
#rsf_lgf_bg{
width:auto;
height:auto;
position:absolute;
top:26px;
left:1px;
z-index:0;
max-height:130px;
overflow:hidden;
text-align:center;
}
#rsf_lgf_bg img{
width:auto;
max-height:130px;
margin:0 auto;
filter:alpha(opacity='{$this->bg_opacity}');
zoom:1;	
}
</style>
<script language="javascript">
var writeBoard = document.getElementById('fastposteditor');
var createDiv = document.createElement('div');
createDiv.setAttribute('id','rsf_lgf_bg');
createDiv.innerHTML = '<img id="rsf_lgf_bg_img" src="
EOF;
 if(!empty($this->bg_img)) { 
$return .= <<<EOF
{$this->bg_img}
EOF;
 } else { 
$return .= <<<EOF
source/plugin/rsf_logo_fill/template/fill_bg.jpg
EOF;
 } 
$return .= <<<EOF
" />';
writeBoard.appendChild(createDiv);

var rsfBgDiv = document.getElementById('rsf_lgf_bg');
rsfBgDiv.style.width = (writeBoard.offsetWidth-2) + 'px';
rsfBgDiv.style.height = (writeBoard.offsetHeight -27) + 'px';
if('{$this->bg_color}'!=0){
rsfBgDiv.style.background = '{$this->bg_color}';
};
var rsfBgImg = document.getElementById('rsf_lgf_bg_img');
var rsfBgImgHeight = '{$this->bg_height}'>0&&'{$this->bg_height}'<=(writeBoard.offsetHeight -27)?'{$this->bg_height}':(writeBoard.offsetHeight -27);
rsfBgImg.style.height = parseInt(rsfBgImgHeight)+'px';
if ('{$this->bg_position}'== 1){
rsfBgImg.style.marginLeft = '{$this->bg_position_x}'+'px';
rsfBgImg.style.marginTop  = '{$this->bg_position_y}'+'px';
}else if('{$this->bg_position}' == 2){
rsfBgImg.style.margin = '0 auto';
rsfBgImg.style.marginTop  = '{$this->bg_position_y}'+'px';
}else if('{$this->bg_position}' == 3){
rsfBgImg.style.marginLeft = '0px';
rsfBgImg.style.marginTop  = '{$this->bg_position_y}'+'px';
rsfBgDiv.style.textAlign  = 'left';
}else if('{$this->bg_position}' == 4){
rsfBgImg.style.marginRight= '0px';
rsfBgImg.style.marginTop  = '{$this->bg_position_y}'+'px';
rsfBgDiv.style.textAlign  = 'right';
}

if('{$this->bg_opacity}'!=''){
if(document.all!=1){
 rsfBgImg.style.opacity='{$this->bg_opacity}'/100;
}
};

var fpMessage = document.getElementById('fastpostmessage');
if('{$this->font_size}'!=''){
fpMessage.style.fontSize = '{$this->font_size}'+'px';
};
if('{$this->font_color}'!=''){
fpMessage.style.color = '{$this->font_color}';	
};

var fontFamily;
switch('{$this->font_type}'-1){
case 0:
fontFamily = '宋体';
break;
case 1:
fontFamily = 'Arial';
break;
case 2:
fontFamily = '微软雅黑';
break;
case 3:
fontFamily = '黑体';
break;
default:
fontFamily = '宋体';

};
fpMessage.style.fontFamily = fontFamily;	
</script>

EOF;
 } 
$return .= <<<EOF


EOF;
?>


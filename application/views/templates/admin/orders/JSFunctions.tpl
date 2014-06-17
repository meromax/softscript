{literal}
<script language="javascript">


function ShowImage(id_to,id_from){
	document.getElementById(id_to).src = document.getElementById(id_from).src;
}


function LoadCategories(id,action,prod_id){
	var objSel   = document.getElementById(id);
	var SectName = objSel.options[objSel.selectedIndex].text;
	if(action=='edit_product'){
		document.location.href = "admin.php?mod_name=MProducts&mod_id=0&action=load_categories&sec_name="+SectName+"&prod_id="+prod_id;
	}
	else{
		document.location.href = "admin.php?mod_name=MProducts&mod_id=0&action=load_categories&sec_name="+SectName;
	}
}

function CheckForm(sec_id,cat_id,title_id,item_id,price_id,wbmc_id,selected_id,color_id){
	var f=true;
	var flag=false;
	var objList = document.getElementById(selected_id);
	if(document.getElementById(sec_id).value=='-- sections --'){
		alert('Choose section!');
		f=false;
	}
	else
	if(document.getElementById(cat_id).value=='-- categories --'){
		alert('Choose category!');
		f=false;
	}
	else
	if(document.getElementById(title_id).value==''){
		alert('Empty "title"!');
		f=false;
	}
	else
	if(document.getElementById(item_id).value==''){
		alert('Empty "Item_id"!');
		f=false;
	}	
	else 
	if(document.getElementById(wbmc_id).checked){
		if(objList.options.length==0){
			alert('Empty "Brand" or "Models"!');
			f=false;
		}
		else
		if(document.getElementById(color_id).value==''){
			alert('Empty "Color"!');
			f=false;
		}
		
	}	
	else 
	if(document.getElementById(price_id).value==''){
		alert('Empty "Price"!');
		f=false;
	}
	if(f==true){
		SaveDataToArray(objList,'bm_id');
	}
	return f;
}

function ShowEdit(id){
	document.getElementById(id).style.background = "#00ff00";
}
function HideEdit(id){
	document.getElementById(id).style.background = "#ffffff";
}

function EditProduct(id){
	document.getElementById(id).style.background = "#0000bb";
	document.location.href = "admin.php?mod_name=MProducts&mod_id=0&action=edit_product&prod_id="+id;
}


function BlockInputUpload(){
	document.getElementById('upload_id').value="";
}

function CheckUploadData(){

	var ChekStr = document.getElementById('upload_id').value;
	var filetype = ChekStr.split(".",2)[1];
	filetype = filetype.toLowerCase();
	var r = new RegExp("[\<|\>|\"|\'|\%|\;|\(|\)|\&|\+|\-]", "i");
	
	if(r.exec(document.getElementById('image_title').value)||document.getElementById('image_title').value.length<1){
		alert("Input correct image title!");
	}else if(filetype=="jpg" || filetype=="gif" || filetype=="bmp" || filetype=="png"){
		document.upform.submit();
	}else{
		alert('Only *.jpg,*.bmp,*.gif,*.png');
	}
}

function ShowBlock(wbmc_id,form_id){
	
	if(document.getElementById(wbmc_id).checked){
		document.getElementById(form_id).style.display="block";
	}
	else{
		document.getElementById(form_id).style.display="none";
	}

}



function setValue(id_from,directory){
	var objSel  = document.getElementById(id_from);
	
	var CurStr = document.getElementById(id_from).options[objSel.selectedIndex].text;
	var filetype = CurStr.split(".",2)[1];
	var data = directory+"/"+document.getElementById(id_from).options[objSel.selectedIndex].value+"_admin";		

	document.getElementById("show_id").src = directory+"/"+document.getElementById(id_from).options[objSel.selectedIndex].value+"_admin";				
	
	
	//alert(data);
}

function ImgSize(action,id){
	
	//alert("asd");
	if(action==0){
			document.getElementById(id).width=document.getElementById(id).width-40;
	}
	else{
			document.getElementById(id).width=document.getElementById(id).width+40;
	}
		
}

function LockButton(){
	var objSel = document.getElementById('id_from');
	var f=false;
	//alert(objSel.options.length);
	if(objSel.options.length==0){
		document.getElementById('del_id').disabled="false";
		f=false;
	}
	if(objSel.options.length>0 && objSel.selectedIndex==-1){
		alert('You should choose the element from the list!');
		f=false;
	}
	if(objSel.options.length>0 && objSel.selectedIndex>-1){
		if(!confirm('If you want to delete, press OK'))  {
			f=false;
		}
		else{
			f=true;
		}
	}
	return f;
}

function LockButton2(){
	var objSel = document.getElementById('id_fromflash');
	var f=false;
	//alert(objSel.options.length);
	if(objSel.options.length==0){
		document.getElementById('flashdel_id').disabled="false";
		f=false;
	}
	if(objSel.options.length>0 && objSel.selectedIndex==-1){
		alert('You should choose the element from the list!');
		f=false;
	}
	if(objSel.options.length>0 && objSel.selectedIndex>-1){
		if(!confirm('If you want to delete, press OK'))  {
			f=false;
		}
		else{
			f=true;
		}
	}
	return f;
}


function SetHidden(id){
	var f=false;
	var data = SetCheckBoxesValuesArray();
	//alert(data);
	document.getElementById(id).value = data;
	if(data.length!=0){
		if(!confirm('If you want to delete, press OK'))  {
			f=false;
		}
		else{
			f=true;
		}
	}
	else{
		alert('Choose the element!');
		f=false;
	}
	return f;
}


function CheckUpload(id_list){
	var objSel = document.getElementById(id_list);
	var f=true;
	if(document.getElementById('upload_type').checked!=true){
		if(objSel.options.length==3){
			alert('You cannot upload more than 3 images of a product.')
			f=false;
		}
	}
	return f;
}

function SetCheckBoxesValuesArray() {

  // ?????????? ????? ????????? ?? ????????		
  var v = document.getElementsByTagName('input');
  var vl=v.length;
  var i=0,k=0,j=0;
  var data = Array();
  var dataout = Array();
  for(i=0; i<vl; i++){
  	 if(v[i].type=='checkbox'){
  	 	data[k] = v[i];
  	 	k++;
  	 }
  }
  //alert(k);	
  // ?????????? id ????????? , ??????? ????????
  for(i=0; i<k; i++){
  	if(document.getElementById(data[i].id).checked==true){
  		//alert(data[i].name);
  		dataout[j]=document.getElementById(data[i].id).value;
  		j++;
  	}
  }
  //alert(dataout);
  return dataout;
}




// Brands , Models , Colors

function SetColor(SelectID, toID){
	var objSel  = document.getElementById(SelectID);
	var CurStr = objSel.options[objSel.selectedIndex].value;
	//alert(CurStr);
	document.getElementById(toID).style.background=objSel.options[objSel.selectedIndex].value;
	
}

function LoadModels(act_id){
    var objL = document.getElementById("selected_id");	
	SaveDataToArray(objL,'bm_id');	
	document.getElementById(act_id).value = 'load_models';
	document.forms.product_form.submit();
}

function LoadCategories(act_id){
    var objL = document.getElementById("selected_id");	
	SaveDataToArray(objL,'bm_id');	
	document.getElementById(act_id).value = 'load_categories';
	document.forms.product_form.submit();
}


function AddFromListToList(id_list_sec, id_list_cat, id_list_to){
	var flag=0;
	var item;
	var item2;
	var sumitems;
	objListSec  = document.getElementById(id_list_sec);
	objListCat  = document.getElementById(id_list_cat);
	objListTo   = document.getElementById(id_list_to);
	
	if(objListSec.options[objListSec.selectedIndex].text=='-- brands --'){
  		alert("You haven't chosen any 'brand'!");
	}
	// you should add either brand name or model name!
	else {
		if(objListCat.selectedIndex==-1){
			item = objListSec.options[objListSec.selectedIndex].text;
			if(CheckIsSetItem(item+"-->All",objListTo)){
				//alert(item);
				objListTo.options[objListTo.options.length] = new Option(item+"-->All","");
				SaveDataToArray(objListTo,'bm_id');
			}
			else{
				//alert('????? ????? ??? ????????!');
			  	alert("You have added such element!");
			}
		}
		else{
			item  = objListSec.options[objListSec.selectedIndex].text;
			item2 = objListCat.options[objListCat.selectedIndex].text;
			sumitems = objListSec.options[objListSec.selectedIndex].text+"-->"+objListCat.options[objListCat.selectedIndex].text;
			if(CheckIsSetItem(item+"-->All",objListTo)){
				if(CheckIsSetItem(sumitems,objListTo)){
					objListTo.options[objListTo.options.length] = new Option(sumitems,"");
					SaveDataToArray(objListTo,'bm_id');
					
				}
				else{
					alert('Error in add!');
				}
				
			}
			else{
				alert('Error in add!');
			}
		}
			
		
	}
	
	
}

function CheckIsSetItem(item,objList){
	var issetflag=0;
	//var objList  = objListTo;//document.getElementById(list_id);
	for(var i=0; i < objList.options.length; i++)
	{
	  if(objList.options[i].text==item){
	  	issetflag=1;
	  	break;
	  }
	}
	if(issetflag==0){
		return true;
	}
	else{
		return false;
	}
}

function DelFromList(list_id){
	objSel = document.getElementById(list_id);
	if(objSel.options.length==0){
		alert("List is empty!");
	}
	else{
	  	if(objSel.selectedIndex==-1){
	  		alert("No items selected!");
	  		return false;
	  	}
	  	else{
			objSel.options[objSel.selectedIndex]=null;
			SaveDataToArray(objSel,'bm_id');
	  	}
	}
}

function SaveDataToArray(objList,hidden){
	var str='';
	for(var i=0; i < objList.options.length; i++)
	{
		str = str+objList.options[i].text;
		if(objList.options.length>1 && i!=objList.options.length-1){
			str = str+"|";
		}
	}
	document.getElementById(hidden).value = str;
}









</script>
{/literal}
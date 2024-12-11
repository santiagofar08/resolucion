<?php


if (!empty($_POST)) {

    $file_pdf = $_POST['archivo']  ;
	//echo $file_pdf;
	
	
	
    
}

if (strpos($file_pdf,".pdf",0) > 0)
echo(
 '<div class="container">
 
  <div class="row" >
 
	  <div class="col-sm-12" >
		  <div id="capa_d">
			<object data="<?php echo $file_pdf;?>" type="application/pdf"  width="480" height="500">
				alt : <a href="<?php echo $file_pdf;?>PDF</a>
			</object>
		  </div>
	   </div>
  </div> 
</div>');
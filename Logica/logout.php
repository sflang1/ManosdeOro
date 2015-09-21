<?php
	@session_start();
	if(isset($_SESSION["USER"]))
	{
		session_unset($_SESSION["USER"]);	
	}
	if(isset($_SESSION["ID"]))
	{
		session_unset($_SESSION["ID"]);	
	}
	if(isset($_SESSION["ROL"]))
	{
		session_unset($_SESSION["ROL"]);	
	}
?>
<script>
	alert("Has cerrado sesi\u00F3n correctamente"):
</script>
<META HTTP-EQUIV="REFRESH" CONTENT="0,URL=../Interfaces">
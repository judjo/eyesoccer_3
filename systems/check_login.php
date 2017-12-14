<?php
if(!isset($_SESSION['admin_id']) && empty($_SESSION['admin_id']))
{
	header("location:backeyes");
}
?>
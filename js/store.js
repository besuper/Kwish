function check(cb){
    if($(cb).is(":checked")){
        document.location.href="store.php?category="+$(cb)[0].getAttribute("name");
    }else{
    	document.location.href="store.php";
    }
}
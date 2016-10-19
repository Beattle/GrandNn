<?header("Content-Type:text/plain; charset=Windows-1251");?>
User-agent: *
Disallow: /admin/
Disallow: /templates/admin/
Host: <?=$_SERVER['HTTP_HOST']?>
<?exit;?>

<?php
//interface
interface IDatabase
{
    function Save($orderId);
}
 
 interface ILogger
{
    function LogInfo($info);
}
 
 interface IEmailSender
{
    function SendEmail($userId);
}
 
// Các Module implement các interface
 class Logger implements ILogger
{
     function LogInfo($info)
    {
        //...
    }
}
 
 class Database implements IDatabase
{
     function Save($orderId)
    {
        //...
    }
}
 
 class EmailSender implements IEmailSender
{
     function SendEmail($userId)
    {
        //...
    }
}

function Checkout($orderId, $userId)
{
    // Nếu muốn thay đổi database, ta chỉ cần thay dòng code dưới
    // Các Module XMLDatabase, SQLDatabase phải implement IDatabase
    //IDatabase $db = new XMLDatabase(); 
    //IDatebase $db = new SQLDatabase();
    IDatabase $db = new Database();
    $db.Save($orderId);
 
    ILogger $log = new Logger();
    $log.LogInfo("Order has been checkout");
 
    IEmailSender $es = new EmailSender();
    $es.SendEmail($userId);
}
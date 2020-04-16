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

}
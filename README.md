# fastorder.ocmod
Fastorder button and one click order form to OpenCart

#English
###Description
Order form in one click for OpenCart. After ordering comes a letter to the post office and the customer and the owner of the site. Mail the owner is taken from the site settings.
Starting with version 1.1.0 , you can set your own styles at fastorder.css file in the folder template "default"

###Install
####Video Tutorial: https://youtu.be/gSCryqFL6i4
If download from Github - just download the modifier and repackage the archive so that all files were in the root of the archive. And let the file name fastorder.ocmod.zip

###Uninstall
Like any modifier OpenCart leaves behind all the additional files (or templates, controller).
For a full removal you need remove files:
    catalog/controller/product/fastorder.php
    catalog/view/theme/default/stylesheet/fastorder.css
    catalog/view/theme/default/template/mail/fastorder_mail_msg.tpl
    catalog/view/theme/default/template/product/fastorder.tpl
    catalog/view/theme/default/template/product/fastorder_form.tpl
    catalog/language/english/product/fastorder.php
    catalog/language/russian/product/fastorder.php
    and other languages ​, if you use

###System requirements
PHP 5.4 and above, OpenCart version 2.0.0.0 and above , Bootstrap, JQuery, php mail or SMTP server

#Русский
###Описание
Форма заказа в один клик для OpenCart. После оформления заказа приходит письмо на почту и заказчику и владельцу сайта. Почта владельца берется из настроек сайта.
Начиная с версии 1.1.0  вы можете задавать собственные стили оформления в файле fastorder.css в шапке шаблона "default"

###Установка
####Видео инструкция: https://youtu.be/gSCryqFL6i4
Если качаете с github, то просто скачайте модификатор и перепакуйте архив так, чтобы все файлы лежали в корне архива. И дайте архиву имя fastorder.ocmod.zip

###Удаление
Как и любой модификатор в OpenCart оставляет после себя все дополнительные файлы (контрллеры и шаблоны).
Для полного удаление удалите файлы:
    catalog/controller/product/fastorder.php
    catalog/view/theme/default/stylesheet/fastorder.css
    catalog/view/theme/default/template/mail/fastorder_mail_msg.tpl
    catalog/view/theme/default/template/product/fastorder.tpl
    catalog/view/theme/default/template/product/fastorder_form.tpl
    catalog/language/english/product/fastorder.php
    catalog/language/russian/product/fastorder.php
    и другие языки, если используете

###Системные требования
PHP версии 5.4 и выше, OpenCart версии 2.0.0.0 и выше, Bootstrap, JQuery, php mail или SMTP сервер

![](https://github.com/WhiskeyMan-Tau/fastorder.ocmod/blob/master/form.png?raw=true)

![](https://github.com/WhiskeyMan-Tau/fastorder.ocmod/blob/master/msg.png?raw=true)
![](https://github.com/WhiskeyMan-Tau/fastorder.ocmod/blob/master/product.png?raw=true)
![](https://github.com/WhiskeyMan-Tau/fastorder.ocmod/blob/master/category.png?raw=true)

#Versions
1.0.1: Bugfix: fix error in view subcategories ($price variable in catogory controller not found)

1.1.1: Add fastorder.css where you may set yours styles for the button and forms. 
    Fix mail filed caption in the mail message.
    Modified language files.
    Add send statistic about install to server, this is test stuff (This is small thanks to me)
    Small rewrite, fix and code edit. More details on the github branch.

1.2.0: Full rewrite mail send method. It is now used to send mail OpenCart mail object.
    Added: If Display stock is enable and out of stock is disbale and product quantity < 0  - do not show fastorder button.
    Now mail Sender contain shop name.
    Small code fix.

1.2.1: Full rewrite email template. Now it use beautiful styles, lile Bootstrap table.
    Edit style for button in cotegory. (border-radius: 0, margin-bottom: 0 and padding 6px).
    Added text shadow to button and modal form header.
    Other styles edit.
    Small fix in mail generator. Now it better optimized for Opencart under 2.2.0 version.
    Now mail message use own templete (catalog/view/theme/default/template/mail/fastorder_mail_msg.tpl), where you can set your own beautifull message template and styles :)

1.2.2: Fix error $subject variable in mail template not found (found in log if errors is off)
    Small styles edit
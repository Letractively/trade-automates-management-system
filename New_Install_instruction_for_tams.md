1. Завантажити XAMPP з http://www.apachefriends.org/en/xampp.html

2. Встановити XAMPP.

3. Запустити його.

4. При винекненні помилки повязаної з тим що порт 80 зайнятий (на Віндовс 7) зайти в XAMPP-dir/apache/conf/httpd.conf, знайти рядок Listen 80 і замінити його на Listen 8080 (наприклад). Перезапустити сервер.

5. Переконатись, що сервер працює ввівши в адресний рядок бравзера

http://localhost/

або

http://localhost:8080/

в залежності від того на який порт настроєний сервер
на екрані повинна зявитись сторінка xampp.

6. Завантажуєм останню версію tasm з trunk'у командою

svn checkout https://trade-automates-management-system.googlecode.com/svn/trunk/ trade-automates-management-system --username youremail@gmail.com

7. копіюєм вміст папки TAMS\_CI в папку (якщо шлях інсталяції не змінювався) в C:\xampp\htdocs

8. Запускаєм mysql з папки C:\xampp\mysql\bin\mysql.exe

9. Виконуєм скрипт C:\xampp\htdocs\script\TAMS\_DB.sql

10. Виконуєм скрипт C:\xampp\htdocs\script\fillData.sql

11. Все. Готово. Якщо в адресному рядку набрати http://localhost/

PS Якщо було змінено порт на якому висить apache то необхідно вручну поправити файл index.php з application/views де вказується використання css файлу. Після цього необдно слідкувати щоб ці зміни не потрапили в trunk.
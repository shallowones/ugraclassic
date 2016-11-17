<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("О нас");
?><table width="100%" cellspacing="0">
   <tr><th>Время</th><th>Место проведения</th><th>Участники</th></tr>
<tr><td>16:00</td><td>на площадке КТЦ «Югра-Классик»</td><td>Дмитрий Кузьменко и заместитель губернатора автономного 
округа Дмитрий Шаповал Дмитрий Кузьменко и заместитель губернатора автономного 
округа Дмитрий Шаповал</td></tr>
<tr><td>19:30</td><td>на площадке КТЦ «Югра-Классик»</td><td>Дмитрий Кузьменко</td></tr>
<tr><td>22:00</td><td>на площадке КТЦ «Югра-Классик»</td><td>Дмитрий Кузьменко</td></tr>
<tr><td>08:15</td><td>на площадке КТЦ «Югра-Классик»</td><td>Дмитрий Кузьменко</td></tr>
  </table>


<form name="test" method="post" action="input1.php">
  <p><b>Ваше имя:</b><br>
   <input type="text" size="40">
  </p>
  <p><b>Каким браузером в основном пользуетесь:</b><Br>
	  <input type="radio" name="browser" value="ie"><label for="radio">Internet Explorer</label><br/>
   <input type="radio" name="browser" value="opera"><label for="radio">Opera</label><br/>
   <input type="radio" name="browser" value="firefox"><label for="radio">Firefox</label><br/>
  </p>

  <p><b>Каким браузером в основном пользуетесь:</b><Br>
   <input type="checkbox" name="browser" value="ie"><label for="checkbox">Internet Explorer</label><br/>
   <input type="checkbox" name="browser" value="opera"><label for="checkbox">Opera</label><br/>
   <input type="checkbox" name="browser" value="firefox"><label for="checkbox">Firefox</label><br/>
  </p>


  <p>Комментарий<Br>
   <textarea name="comment" cols="40" rows="3"></textarea></p>
  <p><input type="submit" value="Отправить">
   <input type="reset" value="Очистить"></p>
 </form>


<form action="select1.php" method="post">
   <p><select>
    <option selected="selected">Выберите героя</option>
    <option value="Чебурашка">Чебурашка</option>
    <option selected value="Крокодил Гена">Крокодил Гена</option>
    <option value="Шапокляк">Шапокляк</option>
    <option value="Крыса Лариса">Крыса Лариса</option>
   </select></p>
   <p><input type="submit" value="Отправить"></p>
  </form>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
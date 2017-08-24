<div data-wow-delay="0.2s" class="wow fadeInLeft">
<div class="contact-section">
<div class="row"> 
<div class="small-12 large-4 medium-4 columns">
<h3>...</h3>
<p>Это высокодходный инструмент, позволящий каждому человеку увеличить свой капитал в разумные сроки. Вам нужно лишь выбрать инвестиционный портфель. После этого вы будете получать до ...% чистой прибыли в сутки до тех пор, пока не решиет вывести свой депозит.</p>
<p>Контакты:</p>
<div class="contact-details"> 
<ul>
<li><i class="fa fa-skype"></i> <a href="" title="SKYPE">...</a></li>
<li><i class="fa fa-envelope-o"></i> <a href="" title="E-MAIL">...</a></li>
</ul>
</div>
</div>
<div class="small-12 large-8 medium-8 columns">
<div id="sendstatus"></div>
<div id="contactform">

<form method="POST" id="feedback-form">
Как к вам обращаться?:
<input type="text" name="nameFF" x-autocompletetype="name">
E-Mail для связи:
<input type="text" name="contactFF" x-autocompletetype="email">
Ваше сообщение:
<textarea name="messageFF" required rows="5"></textarea>
<input class="button alert round disabled expand" type="submit" value="Отправить">
</form>

<script>
document.getElementById('feedback-form').onsubmit = function(){
  var http = new XMLHttpRequest();
  http.open("POST", "mail.php", true);
  http.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  http.send("nameFF=" + this.nameFF.value + "&contactFF=" + this.contactFF.value + "&messageFF=" + this.messageFF.value);
  http.onreadystatechange = function() {
    if (http.readyState == 4 && http.status == 200) {
      alert(http.responseText + 'Ваше сообщение получено.\nНаши специалисты ответят Вам в течении 24-х часов.');
    }
  }
  http.onerror = function() {
    alert('Извините, данные не были переданы.');
  }
  return false;
}
</script>

</div>

</div>
</div>
</div>
</div>

<hr>
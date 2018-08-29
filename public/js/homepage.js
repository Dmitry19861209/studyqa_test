/*** Главная страница ***/

/* Наводим курсор на h2-title */
$(document).on('mouseover', '#main-title', function () {
  textToInput($(this));
});

/* Покидаем input-title */
$(document).on('mouseout', 'input.set-title', function () {
  inputToText($(this));
});

/* Редактировать input-title */
$(document).on('keyup', 'input.set-title', function () {
  let _this = $(this);
  let title = _this.val();
  let _token = $('[name="_token"]').val(),
    url = "/set-title?_token=" + _token + "&title=" + title;

  $.ajax({
    type: 'POST',
    url: url,
    success: function (data) { console.log(data);
      if (data.status === "ok")
        badge('success');
      else badge('danger');
    }
  });
});

/* Поместить текст в input */
function textToInput(selector) {
  let parent = selector.parent();
  let text = selector.text();
  //Создать и заполнить input
  let input = $('<input type="text" class="form-control set-title" name="title" autocomplete="off">');
  input.val(text);
  //Удалить элемент
  selector.remove();
  //Вместо элемента поместить input
  parent.append(input);
  input.focus();
}

/* Input превратить в текст */
function inputToText(selector) {
  let parent = selector.parent();
  let text = selector.val();
  //Создать и заполнить h2
  let h2 = $('<h2 id="main-title">');
  h2.text(text);
  //Удалить элемент
  selector.remove();
  //Вместо элемента поместить h2
  parent.append(h2);
}

/* badge */
function badge(type) {
  const badge = $('.badge-' + type);
  badge.show();

  setTimeout(function () {
    badge.hide();
  }, 200);
}
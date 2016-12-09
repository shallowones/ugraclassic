(function () {
  'use strict';
  var each = Array.prototype.forEach;

  document.addEventListener('DOMContentLoaded', function () {
    var $body = document.getElementsByTagName('body')[0],
      $html = document.getElementsByTagName('html')[0],
      $size = document.querySelectorAll('.js-size'),
      $color = document.querySelectorAll('.js-color');

    each.call($size, function ($item) {
      $item.addEventListener('click', function (e) {
        e.preventDefault();

        if (this.classList.contains('tool__size_active')) {
          return this;
        }

        if ('size' in this.dataset) {
          switch (this.dataset.size) {
            case 'small': $html.style.fontSize = '16px'; break;
            case 'big': $html.style.fontSize = '20px'; break;
            default: $html.style.fontSize = '18px';
          }

          each.call($size, function ($other) {
            $other.classList.remove('tool__size_active');
          });
          this.classList.add('tool__size_active');
        }
      });
    });

    each.call($color, function ($item) {
      $item.addEventListener('click', function (e) {
        e.preventDefault();

        if (this.classList.contains('tool__color_active')) {
          return this;
        }

        if ('color' in this.dataset) {
          $body.className = 'color_' + this.dataset.color;

          each.call($color, function ($other) {
            $other.classList.remove('tool__color_active');
          });
          this.classList.add('tool__color_active');
        }
      });
    });
  });
} ());

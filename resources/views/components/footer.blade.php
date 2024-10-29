<footer class="blog-footer">
    <p>{{ $text }}</p>
    <p>
      <a href="#">Вверх</a>
    </p>
    <button type="button" name="toMail" id="toMail" style="background-color: aqua; border: none" onclick="window.location='{{ route('admin.mails.create')}}'">Написать письмо</button>
    <button type="button" name="toOrder" id="toOrder" style="background-color:chartreuse; border: none" onclick="window.location='{{ route('admin.orders.create')}}'">Заявка на выгрузку</button>
    {{-- <button type="button" name="toMail" id="toMail" style="background-color: aqua; border: none" onclick="window.location='{{ route('mail.index')}}'">Написать письмо</button>
    <button type="button" name="toOrder" id="toOrder" style="background-color:chartreuse; border: none" onclick="window.location='{{ route('order.index')}}'">Заявка на выгрузку</button> --}}
  </footer>
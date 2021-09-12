<section class="mt-mail" style="width: 100%;height: auto;background: #ccc;padding: 2rem;font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif">
    <div class="mail-wrapper" style="width: 100%;max-width: 500px;margin: 0 auto;background: #c5aa64;">
      <img class="party1" src="https://i.ibb.co/x10qZMH/party1.jpg" alt="Armazem do Juca - Aniversário" style="width: 100%;">
      <div class="person" style="text-align:center; padding: 1rem 0;">
        <h3 style="font-weight: bold;color: #fff;font-size: 1rem;">Parabéns!!!</h3>
        <h1 style="font-weight: bold;color: #293c2a;font-size: 1.5rem;margin: 0.5rem 0;"><?php echo e($voucherUser->name); ?></h1>
        <h3 style="font-weight: bold;color: #fff;font-size: 1rem;"><?php echo e(env('APP_NAME')); ?> - Seu Aniversário Feliz</h3>
      </div>
      <div class="info" style="background: #fff;padding: 1rem;text-align: center;color: #293c2a;">
        Válido somente no dia do seu aniversário,
        <strong>MEDIANTE APRESENTAÇÃO DO VOUCHER IMPRESSO E DOCUMENTO DE
          INDENTIFICAÇÃO COM FOTO.
        Consultar horário de funcionamento no site <a href="<?php echo e(env('URL_REDIRECT')); ?>"><?php echo e(env('APP_NAME')); ?></a>.
        Bebidas e sobremesas, 10% a parte.
      </strong></div>
      <img class="party2" src="https://i.ibb.co/s9dSBt7/party2.jpg" alt="Armazem do Juca - Aniversário" style="width: 100%;">
      <div class="voucher-title" style="color: #293c2a;font-weight: bold;text-align: center;padding: 0.5rem 0;font-size: 1.5rem;">Voucher Aniversariante</div>
      <div class="voucher-person" style="background: #fff;padding: 1rem;">
        <table style="width: 100%;margin: 0 auto;">
          <tr>
            <td>Código</td>
            <td><strong><?php echo e($voucherUser->token); ?></strong></td>
          </tr>
          <tr>
            <td>Nome</td>
            <td><strong><?php echo e($voucherUser->name); ?></strong></td>
          </tr>
          <tr>
            <td>Email</td>
            <td><strong><?php echo e($voucherUser->email); ?></strong></td>
          </tr>
          <tr>
            <td>Data de Nasc</td>
            <td><strong><?php echo e($voucherUser->date_of_birth); ?></strong></td>
          </tr>
        </table>
      </div>
    </div>
  </section>
<?php /**PATH /home/devops/Projects/apache/laravel-api-vouchers/resources/views/mail/voucherMail.blade.php ENDPATH**/ ?>
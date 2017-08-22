@extends('layouts.site')

@section('content')
    <!--contact start here-->
    <div class="contact" style="background: #FFF;">
        <div class="container">
            <div class="contact-main">
                <div class="contact-top">
                    <h2>Contato</h2>
                    <p>Fale conosco por um de nossos canais de atendimento, ou deixe uma mensagem no formulário abaixo. Ficaremos felizes em atendê-lo!</p>
                </div>
                <div class="contact-block1">
                    <div class="col-md-6 contact-address">
                        <h3>Informações de contato</h3>
                        <p></p>
                        <ul>
                            <li><span class="glyphicon glyphicon-map-marker" aria-hidden="true"> </span><p>Setor D Sul, Área Especial nº 18, Taguatinga Brasília - DF</p></li>
                            <li><span class="glyphicon glyphicon-phone" aria-hidden="true"> </span><p>(61) 3562-4681</p></li>
                            <li><span class="glyphicon glyphicon-envelope" aria-hidden="true"> </span><p><a href="mailto:contato@gaeeb.org.br">contato@gaeeb.org.br</a></p></li>
                        </ul>
                    </div>
                    <div class="col-md-6 contact-block-left">
                        <form action="#" method="post">
                            <input type="text" placeholder="Nome" required="" name="Name">
                            <input type="text" class="email" placeholder="Email" name="Email">
                            <input type="text" class="subject" placeholder="Assunto" name="Subject">
                            <textarea placeholder="Mensagem" name="message"></textarea>
                            <input type="submit" value="Enviar">
                        </form>
                    </div>
                    <div class="clearfix"> </div>
                </div>
                <div class="contact-map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3838.1567257544075!2d-48.05295948591965!3d-15.84835802850477!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x935a329aae0d786d%3A0xbce5be76f693150c!2sGrupo+de+Assist%C3%AAncia+Espiritual+Eur%C3%ADpedes+Barsanulfo!5e0!3m2!1spt-BR!2sbr!4v1487938185215" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
    <!--contact end here-->
@endsection
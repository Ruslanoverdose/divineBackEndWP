<?php get_header(); ?>
<?
    query_posts('post_type=ourworks');
?>
        <section id="header">
            <div class="container">
                <div class="row">
                    <div class="col-sm-5">
                        <div class="caption">
                            <h5>
                                <? bloginfo('description')?>
                            </h5>
                            <h1>
                                <? bloginfo('name')?>
                            </h1>
                        </div>
                    </div>
                    <div class="col-sm-7">
                        <div class="picture">
                            <img src="<?=get_template_directory_uri()?>/img/1.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="next">
                <a id="downArrowButton" href="#services">
                    <img src="<?=get_template_directory_uri()?>/img/icons/arrow.png" alt="">
                </a>
            </div>
        </section>
        <section id="services" class="bgLight pd70">
            <div class="container">
                <div class="title text-center">
                    <h1>
                        Разработка крутых сайтов, интерактивного веб-дизайна, комплексное продвижение, рекламная и техническая поддержка сайтов.
                    </h1>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="service">
                            <a href="">
                                <div class="service__block">
                                    <div class="service__icon">
                                        <img src="<?=get_template_directory_uri()?>/img/icons/dev.png" alt="">
                                    </div> 
                                    <div class="service__title">
                                        <h3>Разработа сайтов</h3>
                                    </div>
                                    <div class="service__text">
                                        Создание корпоративных сайтов, интернет-магазинов, промо-сайтов и сайтов небольших компаний.
                                    </div> 
                                </div>
                            </a>
                            
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="service">
                            <a href="">
                                <div class="service__block">
                                    <div class="service__icon">
                                        <img src="<?=get_template_directory_uri()?>/img/icons/startup.png" alt="">
                                    </div>
                                    <div class="service__title">
                                        <h3>Продвижение сайтов</h3>
                                    </div>
                                    <div class="service__text">
                                        Комплексное продвижение сайтов в digital пространстве. SEO технологии, поддержка сервисов Google и Яндекс.
                                    </div>
                                </div>
                            </a>
                            
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="service">
                            <a href="">
                                <div class="service__block">
                                    <div class="service__icon">
                                        <img src="<?=get_template_directory_uri()?>/img/icons/paint.png" alt="">
                                    </div>
                                    <div class="service__title">
                                        <h3>Дизайн</h3>
                                    </div>
                                    <div class="service__text">
                                        Интерактивный дизайн, дизайн wow-эффектов, брендбука - фирменного стиля и логотипа компании
                                    </div>
                                </div>
                            </a>
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="portfolio" class="pd70 background2">
            <div class="container">
                <div class="title">
                    <h1>Наши работы</h1>
                </div>
                <div class="works">
                <? while (have_posts()) : the_post();?>
                    <div class="work">
                        <?
                            $url = get_post_meta(get_the_ID(), 'Ссылка', true);
                        ?>
                        <div class="work__title">
                            <? the_title();?>
                        </div>
                        <div class="work__cover">
                        <? the_post_thumbnail()  ?>
                        </div>
                        <div class="work__desc">
                            Сайт по ремонту компьютеров. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quas, quo?
                        </div>
                        <div class="work__bottom">
                            <a href="<?=$url['url']?>" class="customLink">
                                Открыть сайт
                            </a>
                        </div>
                    </div>
                <?endwhile;?>
                </div>
            </div>
        </section>
        <section id="features" class="pd70 background3">
            <div class="container">
                <div class="features-block">
                        <div class="feature">
                            <div class="feature__icon">
                                <img src="<?=get_template_directory_uri()?>/img/icons/time.png" alt="">
                            </div>
                            <div class="feature__title">
                                Сроки
                            </div>
                            <div class="feature__desc">
                                Мы всегда предоставляем клиенту реальную оценку сроков и строго следим за её выполнением.
                            </div>
                        </div>
                        <div class="feature">
                            <div class="feature__icon">
                                <img src="<?=get_template_directory_uri()?>/img/icons/smartphone.png" alt="">
                            </div>
                            <div class="feature__title">
                                Мобильный дизайн
                            </div>
                            <div class="feature__desc">
                                Используем адаптивный дизайн и мобильные технологии, для того чтобы сайты отлично смотрелись на различных устройствах.
                            </div>
                        </div>
                        <div class="feature">
                            <div class="feature__icon">
                                <img src="<?=get_template_directory_uri()?>/img/icons/megaphone.png" alt="">
                            </div>
                            <div class="feature__title">
                                SEO ready
                            </div>
                            <div class="feature__desc">
                                Мы изначально оптимизируем сайты, используя SEO технологии, подготавливая новый сайт к продвижению.
                            </div>
                        </div>
                        <div class="feature">
                            <div class="feature__icon">
                                <img src="<?=get_template_directory_uri()?>/img/icons/brush.png" alt="">
                            </div>
                            <div class="feature__title">
                                Дизайн
                            </div>
                            <div class="feature__desc">
                                Используем только оригинальный платный контент - шрифты, картинки, темы и модули.
                            </div>
                        </div>
                        <div class="feature">
                            <div class="feature__icon">
                                <img src="<?=get_template_directory_uri()?>/img/icons/network.png" alt="">
                            </div>
                            <div class="feature__title">
                                Комплексная работа
                            </div>
                            <div class="feature__desc">
                                Проводим рекламные кампании, ведем аккаунты во всех сервисах и социальных сетях, разрабатываем сайты и дизайн под ключ.
                            </div>
                        </div>
                        <div class="feature">
                            <div class="feature__icon">
                                <img src="<?=get_template_directory_uri()?>/img/icons/customer-support.png" alt="">
                            </div>
                            <div class="feature__title">
                                Гарантийная поддержка
                            </div>
                            <div class="feature__desc">
                                Мы оказываем гарантийное и послегарантийное обслуживание проектов наших клиентов.
                            </div>
                        </div>
                </div>
                
            </div>
        </section>
        <section id="process">
            <div class="columns">
                <div class="columns__column bgLight pd70">
                    <div class="column-title">
                        <h1>
                            Процесс создания сайта
                        </h1>
                    </div>
                </div>
                <div class="columns__column pd70">
                    <div class="column-content">
                        <ol>
                            <li><span>Обсуждение проекта</span></li>
                            <li><span>Анализ Вашей ниши</span></li>
                            <li><span>50% оплаты</span></li>
                            <li><span>Работа</span></li>
                            <li><span>Запуск</span></li>
                            <li><span>50% оплаты</span></li>
                        </ol>
                    </div>
                    
                </div>
            </div>
        </section>
        <section id="contact" class="pd70">
            <div class="container">
                <div class="title">
                    <h1>Контакты</h1>
                </div>
                <div class="contactBlock">
                    <form action="">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="field">
                                    <input type="text" placeholder="Ваше имя">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="field">
                                    <input type="text" placeholder="Email">
                                </div>
                            </div>
                        </div>
                        <div class="field">
                            <input type="text" placeholder="Тема">
                        </div>
                        <div class="field">
                            <textarea name="" id="" placeholder="Ваще сообщение"></textarea>
                        </div>
                        <div class="field">
                            <button class="customButton">
                                Отправить
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </section>

<?php get_footer(); ?>
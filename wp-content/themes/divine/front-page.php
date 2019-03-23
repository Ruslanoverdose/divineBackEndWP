<?php get_header(); ?>

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
<?
    query_posts('post_type=services&order=ASC');
?>
        <section id="services" class="bgLight pd70">
            <div class="container">
                <div class="title text-center">
                    <h1>
                        Разработка крутых сайтов, интерактивного веб-дизайна, комплексное продвижение, рекламная и техническая поддержка сайтов.
                    </h1>
                </div>
                <div class="row">
                <? while (have_posts()) : the_post();?>
                    <div class="col-md-4">
                        <div class="service">
                            <div class="service__block">
                                <div class="service__icon">
                                    <? the_post_thumbnail()  ?>
                                </div> 
                                <div class="service__title">
                                    <h3><? the_title(); ?></h3>
                                </div>
                                <div class="service__text">
                                    <? the_excerpt(); ?>
                                </div> 
                            </div>
                        </div>
                    </div>
                <? endwhile; ?>
                </div>
            </div>
        </section>
<?
    query_posts('post_type=ourworks');
?>
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
<?
    query_posts('post_type=features&order=ASC');
?>
        <section id="features" class="pd70 background3">
            <div class="container">
                <div class="features-block">
                <? while (have_posts()) : the_post();?>
                        <div class="feature">
                            <div class="feature__icon">
                                <? the_post_thumbnail()  ?>
                            </div>
                            <div class="feature__title">
                                <? the_title();?>
                            </div>
                            <div class="feature__desc">
                           <? the_excerpt(); ?>
                            </div>
                        </div>
                <? endwhile; ?>
                </div>
                
            </div>
        </section>
<?
    query_posts('post_type=steps&order=ASC');
?>
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
                        <? while (have_posts()) : the_post();?>
                            <li><span><?the_title();?></span></li>
                        <? endwhile; ?>
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
                    <? echo do_shortcode('[contact-form-7 id="50" title="Обратная связь"]');?>
                </div>
            </div>
        </section>

<?php get_footer(); ?>
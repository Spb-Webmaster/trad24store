@props([
   'sum' => 0,
   'sem' => 0,
   'ugo' => 0,
   'gra' => 0,
   'kor' => 0,
   'uve' => 0,
   'tru' => 0,
   'ban' => 0,
])

<div class="count_to_mediators">
    <div class="count_t_m_top">
        <div class="count_m">Количество медиации:
            <span>{{ $sum }}</span></div>
    </div>
    <div class="count_t_m_middle">
        <div class="count_m_opt">
            <div class="name_medi">Семейная</div>
            <span>{{ $sem }}</span></div><!--.count_m_opt-->
        <div class="count_m_opt">
            <div class="name_medi">Уголовная</div>
            <span>{{ $ugo }}</span></div><!--.count_m_opt-->
        <div class="count_m_opt">
            <div class="name_medi">Гражданская</div>
            <span>{{ $gra }}</span></div><!--.count_m_opt-->
        <div class="count_m_opt">
            <div class="name_medi">Корпоративная</div>
            <span>{{ $kor }}</span></div><!--.count_m_opt-->
        <div class="count_m_opt">
            <div class="name_medi">Ювенальная</div>
            <span>{{ $uve }}</span></div><!--.count_m_opt-->
        <div class="count_m_opt">
            <div class="name_medi">Трудовые споры</div>
            <span>{{ $tru }}</span></div><!--.count_m_opt-->
        <div class="count_m_opt">
            <div class="name_medi">Банковские споры</div>
            <span>{{ $ban }}</span></div><!--.count_m_opt-->
    </div>
    <div class="count_t_m_bottom"></div>
</div>

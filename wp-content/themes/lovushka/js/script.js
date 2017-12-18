jQuery(document).ready(function () {
  var cur_animation_val = 0,
      paused = true,
      count_animation = 0,
      rotat_per_sec = 1.5;
      rotateVal = 0,
      instructions = {
        0: 'Вспомните ситуацию в которой вы волновались, суетились, боялись того, что может случиться.',
        1: 'Вспомните ситуацию, где вы злились на кого-то либо на себя.',
        2: 'Вспомните ситуацию, когда вы сдерживали себя, либо считали себя недостаточно способными, успешными или достойными.',
        3: 'Вспомните, как вы переживали по поводу мнения о вас других людей, либо вам навязывали чужое мнение и заставляли вас поступать помимо вашей воли и желания.',
        4: 'Вспомните, как вы рассказывали и показывали другим людям правильное положение вещей, либо пытались продавить ситуацию в свою пользу.',
        5: 'Вспомните, как вы не могли с чем-либо или с кем-либо смириться и принять для себя некое положение вещей как неизбежное.',
        6: 'Вспомните как вы переживали чувство вины.',
        7: 'Вспомните некое желание предметов либо жизненных планов, необходимость следовать моральным или иным ценностям, соблюдать запреты и выполнять инструкции.',
        8: 'Вспомните как вы испытывали дилемму касательно того или иного материального объекта или отношений между людьми, либо как вы сами себя обманывали или уговаривали на принятие решения.',
        9: 'Вспомните свои нереализованные жизненные планы.',
        10: 'Вспомните перенесённые вами состояния обиды и унижения.',
        11: 'Вспомните переживания угрозы вашей жизни - например, как вы захлебывались или не могли вдохнуть, падали или травмировались, попадали в аварию, испытывали физическое насилие над собой или ваши родители грозились отдать вас в детский дом.',
       }
  jQuery('.set_acept').on('click', function(event) {
    $('#set').modal('hide');
    $('#result').modal('show');
  });
  jQuery('.question').on('click', function(event) {
    jQuery(this).toggleClass('active');
  });
 // Быстрее 
  jQuery('.speed_faster').on('click', function(event) {
    if (paused == false) {
      rotat_per_sec += 1;
    } else {
      rotat_per_sec += 1;
      paused = false;
      jQuery('.fa-play').removeClass('fa-play').addClass('fa-pause');
      jQuery('.speed_control').removeClass('hidden');
      phaseOne = setInterval(function(){
        if (count_animation <= 360){                                                                         //120
          jQuery('.protocol').css('transform', 'rotate('+cur_animation_val+'deg)');
          count_animation += 0.5;
          cur_animation_val += rotat_per_sec;
          console.log(rotat_per_sec);
        } else {
            clearInterval(phaseOne);
            jQuery('.protocol').css('transform', 'rotate(0deg)');
        } 
      }, 500);
    }
  });
  // Медленнее
  jQuery('.speed_slover').on('click', function(event) {
    if (paused == false) {
      rotat_per_sec -= 1;
      if (rotat_per_sec <= 1) {
        rotat_per_sec = 1;
      }
    } else {
      rotat_per_sec -= 1;
      if (rotat_per_sec <= 1) {
        rotat_per_sec = 1;
      }
      paused = false;
      jQuery('.fa-play').removeClass('fa-play').addClass('fa-pause');
      jQuery('.speed_control').removeClass('hidden');
      phaseOne = setInterval(function(){
        if (count_animation <= 360){                                                                         //120
          jQuery('.protocol').css('transform', 'rotate('+cur_animation_val+'deg)');
          count_animation += 0.5;
          cur_animation_val += rotat_per_sec;
          console.log(rotat_per_sec);
        } else {
            clearInterval(phaseOne);
        } 
      }, 500);
    }
  });
// Запуск протокола
  jQuery('.start_prot').on('click', function(event) {
    paused = false;
    jQuery('.fa-play').removeClass('fa-play').addClass('fa-pause');
    jQuery('.speed_control').removeClass('hidden');
    $('#result').modal('hide');
    jQuery('.start_prot').addClass('hidden');
    jQuery('.stop_prot').removeClass('hidden');
    phaseOne = setInterval(function(){
      if (count_animation <= 360){                                                                         //120
        jQuery('.protocol').css('transform', 'rotate('+cur_animation_val+'deg)');
        count_animation += 0.5;
        cur_animation_val += rotat_per_sec;
        console.log(rotat_per_sec);
      } else {
          clearInterval(phaseOne);
          jQuery('.protocol').css('transform', 'rotate(0deg)');
      } 
    }, 500);
  });
  // Пауза/Пуск
  jQuery('.play').on('click', function(event) {
    console.log(paused);
    if (paused == false) {
      jQuery('.fa-pause').removeClass('fa-pause').addClass('fa-play');
      paused = true;
      clearInterval(phaseOne);
    } else {
      paused = false;
      jQuery('.fa-play').removeClass('fa-play').addClass('fa-pause');
      phaseOne = setInterval(function(){
        if (count_animation <= 360){                                                                         //120
          jQuery('.protocol').css('transform', 'rotate('+cur_animation_val+'deg)');
          count_animation += 0.5;
          cur_animation_val += rotat_per_sec;
          console.log(rotat_per_sec);
        } else {
            clearInterval(phaseOne);
            jQuery('.protocol').css('transform', 'rotate(0deg)');
        } 
      }, 500);
    }
  });
  // Остановка протокола
  jQuery('.stop_prot').on('click', function(event) {
    jQuery('.fa-pause').removeClass('fa-pause').addClass('fa-play');
    paused = true;
    clearInterval(phaseOne);
    jQuery('.start_prot').removeClass('hidden');
    jQuery('.stop_prot').addClass('hidden');
  });
  // Смена цвета
  jQuery('.color_item').on('click', function(event) {
    jQuery('.protocol').css('background', jQuery(this).data('color'));
  });
  // Подгон ширины
  jQuery('.protocol').css('height', jQuery('.protocol').css('width'));
  jQuery('.protocol svg').css('height', jQuery('.protocol svg').css('width'));
  jQuery('window').on('change', function(event) {
    jQuery('.protocol').css('height', jQuery('.protocol').css('width'));
    jQuery('.protocol svg').css('height', jQuery('.protocol svg').css('width'));
  });
});

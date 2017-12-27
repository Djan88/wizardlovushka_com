jQuery(document).ready(function () {
  var cur_animation_val = 0,
      paused = true,
      count_animation = 0,
      rotat_per_sec = 2,
      rotateVal = 0,
      quest_count = 0,
      cur_instruction = 1,
      instruction_one = undefined,
      instruction_two = undefined,
      instruction_three = undefined,
      instruction_four = undefined,
      speed_from = undefined,
      speed_one = undefined,
      speed_two = undefined,
      speed_three = undefined,
      speed_four = undefined,
      instructions = {
        '1': 'Вспомните ситуацию в которой вы волновались, суетились, боялись того, что может случиться.',
        '2': 'Вспомните ситуацию, где вы злились.',
        '3': 'Вспомните ситуацию, когда вы сдерживались и терпели, либо занижали самооценку.',
        '4': 'Вспомните, как вас заставляли согласиться с чужим мнением.',
        '5': 'Вспомните ситуацию, когда вы пытались донести до других правильную точку зрения.',
        '6': 'Вспомните ситуацию обмана и несправедливости к вам, невозможность смириться с чем-либо.',
        '7': 'Вспомните переживания чувства вины.',
        '8': 'Вспомните увлеченность идеей, планами жизни, желанием материальных ценностей.',
        '9': 'Вспомните свои сомнения при выборе того или иного товара или сомнения в чувствах при отношениях с людьми.',
        '10': 'Вспомните свои нереализованные жизненные цели и желания.',
        '11': 'Вспомните свои обиды и унижения.',
        '12': 'Вспомните состояние переживания одиночества.'
       }
// Клик по вопросу
  jQuery('.question').on('click', function() {
    console.log(quest_count);
    // Если клик по уже выбранному пункту
    if (jQuery(this).hasClass('active')) {
      quest_count -= 1;
      jQuery(this).removeClass('active').addClass('noactive');
      jQuery('.noactive').removeClass('hidden');
      jQuery('.clear_prot').removeClass('hidden');
      jQuery('.set_acept').removeClass('hidden');
      if (quest_count == 0) {
        jQuery('.clear_prot').addClass('hidden');
        jQuery('.set_acept').addClass('hidden');
      }
      if (quest_count == 1) {
        if (instruction_three) {
          instruction_one = instruction_three;
        }
        if (instruction_four) {
          instruction_two = instruction_four;
        }
        instruction_three = undefined;
        instruction_four = undefined;
      } else if (quest_count == 0) {
        instruction_one = undefined;
        instruction_two = undefined;
        instruction_three = undefined;
        instruction_four = undefined;
      }
    //Клик по новому вопросу
    } else { 
      quest_count += 1;
      jQuery(this).addClass('active');
      jQuery(this).removeClass('noactive');
      jQuery('.clear_prot').removeClass('hidden');
      jQuery('.set_acept').removeClass('hidden');
      // Запоминание инструкций и установка скорости вращения
      if (quest_count == 1) {
        instruction_one = instructions[jQuery(this).data('quest_one')];
        speed_from = jQuery(this).data('quest_one');
        if (speed_from == "1" || speed_from == "2" || speed_from == "3" || speed_from == "12") {
          speed_one = 2
        } else if (speed_from == "4" || speed_from == "5" || speed_from == "6") {
          speed_one = 10
        } else if (speed_from == "7" || speed_from == "9" || speed_from == "10" || speed_from == "11") {
          speed_one = 20
        } else if (speed_from == "8") {
          speed_one = 34
        }
        instruction_two = instructions[jQuery(this).data('quest_two')];
        speed_from = jQuery(this).data('quest_two');
        if (speed_from == "1" || speed_from == "2" || speed_from == "3" || speed_from == "12") {
          speed_two = 2
        } else if (speed_from == "4" || speed_from == "5" || speed_from == "6") {
          speed_two = 10
        } else if (speed_from == "7" || speed_from == "9" || speed_from == "10" || speed_from == "11") {
          speed_two = 20
        } else if (speed_from == "8") {
          speed_two = 34
        }
      } else if (quest_count == 2) {
        instruction_three = instructions[jQuery(this).data('quest_one')];
        speed_from = jQuery(this).data('quest_one');
        if (speed_from == "1" || speed_from == "2" || speed_from == "3" || speed_from == "12") {
          speed_three = 2
        } else if (speed_from == "4" || speed_from == "5" || speed_from == "6") {
          speed_three = 10
        } else if (speed_from == "7" || speed_from == "9" || speed_from == "10" || speed_from == "11") {
          speed_three = 20
        } else if (speed_from == "8") {
          speed_three = 34
        }
        instruction_four = instructions[jQuery(this).data('quest_two')];
        speed_from = jQuery(this).data('quest_two');
        if (speed_from == "1" || speed_from == "2" || speed_from == "3" || speed_from == "12") {
          speed_four = 2
        } else if (speed_from == "4" || speed_from == "5" || speed_from == "6") {
          speed_four = 10
        } else if (speed_from == "7" || speed_from == "9" || speed_from == "10" || speed_from == "11") {
          speed_four = 20
        } else if (speed_from == "8") {
          speed_four = 34
        }
        if (instruction_three == instruction_one || instruction_three == instruction_two) {
          instruction_three = undefined;
          speed_three = undefined;
        }
        if (instruction_four == instruction_one || instruction_four == instruction_two) {
          instruction_four = undefined;
          speed_four = undefined;
        }
      }
      // Если выбрано 2 пункта
      if (quest_count >= 2) {
        jQuery('.noactive').addClass('hidden');
      }
    }
  });
//Отмена выбора
jQuery('.clear_prot, .stop_prot, .stop').on('click', function() {
  quest_count = 0;
  jQuery('.clear_prot').addClass('hidden');
  jQuery('.set_acept').addClass('hidden');
  instruction_one = undefined;
  instruction_two = undefined;
  instruction_three = undefined;
  instruction_four = undefined;
  cur_instruction = 1;
  jQuery('.instruction_block').addClass('hidden');
  jQuery('.close_instr').addClass('hidden');
  jQuery('.next_instr').removeClass('hidden');
  jQuery('.question').removeClass('active').addClass('noactive').removeClass('hidden');
  jQuery('.clear_prot').addClass('hidden');
});

// Инструктаж перед стартом
  jQuery('.set_acept').on('click', function() {
    jQuery('#set').modal('hide');
    jQuery('#result').modal('show');
  });
 // Быстрее 
  jQuery('.speed_faster').on('click', function() {
    if (paused == false) {
      rotat_per_sec += 2;
    } else {
      rotat_per_sec += 2;
      paused = false;
      jQuery('.fa-play').removeClass('fa-play').addClass('fa-pause');
      jQuery('.speed_control').removeClass('hidden');
      phaseOne = setInterval(function(){
        if (count_animation <= 1200){                                                                         //120
          jQuery('.protocol').css('transform', 'rotate('+cur_animation_val+'deg)');
          count_animation += 0.5;
          cur_animation_val -= rotat_per_sec;
        } else {
            clearInterval(phaseOne);
            jQuery('.protocol').css('transform', 'rotate(0deg)');
        } 
      }, 500);
    }
  });
  // Медленнее
  jQuery('.speed_slover').on('click', function() {
    if (paused == false) {
      rotat_per_sec -= 2;
      if (rotat_per_sec <= 1) {
        rotat_per_sec = 2;
      }
    } else {
      rotat_per_sec -= 2;
      if (rotat_per_sec <= 1) {
        rotat_per_sec = 2;
      }
      paused = false;
      jQuery('.fa-play').removeClass('fa-play').addClass('fa-pause');
      jQuery('.speed_control').removeClass('hidden');
      phaseOne = setInterval(function(){
        if (count_animation <= 1200){                                                                         //120
          jQuery('.protocol').css('transform', 'rotate('+cur_animation_val+'deg)');
          count_animation += 0.5;
          cur_animation_val -= rotat_per_sec;
        } else {
            clearInterval(phaseOne);
        } 
      }, 500);
    }
  });
// Запуск расширенного протокола
  jQuery('.start_prot').on('click', function() {
    paused = false;
    jQuery('.instr').text(instruction_one);
    jQuery('.instruction_block').removeClass('hidden');
    jQuery('.set_acept').addClass('hidden');
    jQuery('.clear_prot').addClass('hidden');
    jQuery('.fa-play').removeClass('fa-play').addClass('fa-pause');
    jQuery('.speed_control').removeClass('hidden');
    jQuery('#result').modal('hide');
    jQuery('.questions').addClass('hidden');
    jQuery('.runed').removeClass('hidden');
    console.log("speed_one "+speed_one);
    console.log("speed_two "+speed_two);
    console.log("speed_three "+speed_three);
    console.log("speed_four "+speed_four);
    phaseOne = setInterval(function(){
      if (count_animation <= 1200){                                                                         //120
        jQuery('.protocol').css('transform', 'rotate('+cur_animation_val+'deg)');
        count_animation += 0.5;
        cur_animation_val -= speed_one;
      } else {
          clearInterval(phaseOne);
          jQuery('.protocol').css('transform', 'rotate(0deg)');
      } 
    }, 500);
  });
// Переключение инструкций
jQuery('.instruction_block').on('click', function() {
  cur_instruction += 1;
  if (cur_instruction == 2 && instruction_two) {
    jQuery('.instr').text(instruction_two);
    rotat_per_sec = speed_two;
    if (instruction_three == undefined) {
      jQuery('.close_instr').removeClass('hidden');
      jQuery('.next_instr').addClass('hidden');
    }
  } else if (cur_instruction == 3 && instruction_three) {
    jQuery('.instr').text(instruction_three);
    rotat_per_sec = speed_three;
    if (instruction_four == undefined) {
      jQuery('.close_instr').removeClass('hidden');
    jQuery('.next_instr').addClass('hidden');
    }
  } else if (cur_instruction == 4 && instruction_four) {
    jQuery('.instr').text(instruction_four);
    rotat_per_sec = speed_four;
    jQuery('.close_instr').removeClass('hidden');
    jQuery('.next_instr').addClass('hidden');
  } else {
    jQuery('.close_instr').removeClass('hidden');
    jQuery('.next_instr').addClass('hidden');
  }
  phaseOne = setInterval(function(){
    if (count_animation <= 1200){                                                                         //120
      jQuery('.protocol').css('transform', 'rotate('+cur_animation_val+'deg)');
      count_animation += 0.5;
      cur_animation_val -= rotat_per_sec;
    } else {
        clearInterval(phaseOne);
        jQuery('.protocol').css('transform', 'rotate(0deg)');
    } 
  }, 500);
});
//Закрытие окна инструкций
  jQuery('.close_instr').on('click', function() {
    jQuery('.instruction_block').addClass('hidden');
    jQuery('.close_instr').addClass('hidden');
    jQuery('.next_instr').removeClass('hidden');
    cur_instruction = 1;
  });
  // Пауза/Пуск
  jQuery('.play').on('click', function() {
    if (paused == false) {
      jQuery('.fa-pause').removeClass('fa-pause').addClass('fa-play');
      paused = true;
      clearInterval(phaseOne);
    } else {
      paused = false;
      jQuery('.fa-play').removeClass('fa-play').addClass('fa-pause');
      jQuery('.questions').addClass('hidden');
      jQuery('.runed').removeClass('hidden');
      phaseOne = setInterval(function(){
        if (count_animation <= 1200){                                                                         //120
          jQuery('.protocol').css('transform', 'rotate('+cur_animation_val+'deg)');
          count_animation += 0.5;
          cur_animation_val -= rotat_per_sec;
        } else {
            clearInterval(phaseOne);
            jQuery('.protocol').css('transform', 'rotate(0deg)');
        } 
      }, 500);
    }
  });
  // Остановка протокола
  jQuery('.stop_prot, .stop').on('click', function() {
    jQuery('.fa-pause').removeClass('fa-pause').addClass('fa-play');
    jQuery('.question').removeClass('active');
    paused = true;
    jQuery('.protocol').css('transform', 'rotate(0deg)');
    rotat_per_sec = 1.5;
    cur_animation_val = 0;
    clearInterval(phaseOne);
    jQuery('.questions').removeClass('hidden');
    jQuery('.runed').addClass('hidden');
    quest_count = 0;
    instruction_one = undefined;
    instruction_two = undefined;
    instruction_three = undefined;
    instruction_four = undefined;
    speed_from = undefined;
    speed_one = undefined;
    speed_two = undefined;
    speed_three = undefined;
    speed_four = undefined;
    cur_instruction = 1;
    jQuery('.close_instr').addClass('hidden');
    jQuery('.next_instr').removeClass('hidden');
    jQuery('.instruction_block').addClass('hidden');
  });

  jQuery('.protocol').css('height', jQuery('.protocol').css('width'));
  jQuery('.protocol svg').css('height', jQuery('.protocol svg').css('width'));
  jQuery(window).resize(function() {
    jQuery('.protocol').css('height', jQuery('.protocol').css('width'));
    jQuery('.protocol svg').css('height', jQuery('.protocol svg').css('width'));
  });
  jQuery('.set_disabled').popover();
});

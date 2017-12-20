jQuery(document).ready(function () {
  var cur_animation_val = 0,
      paused = true,
      count_animation = 0,
      rotat_per_sec = 1.5;
      rotateVal = 0,
      quest_count = 0,
      cur_instruction = 1,
      instruction_one = undefined,
      instruction_two = undefined,
      instruction_three = undefined,
      instruction_four = undefined,
      instructions = {
        "1": 'Вспомните ситуацию в которой вы волновались, суетились, боялись того, что может случиться.',
        "2": 'Вспомните ситуацию, где вы злились на кого-то либо на себя.',
        "3": 'Вспомните ситуацию, когда вы сдерживали себя, либо считали себя недостаточно способными, успешными или достойными.',
        "4": 'Вспомните, как вы переживали по поводу мнения о вас других людей, либо вам навязывали чужое мнение и заставляли вас поступать помимо вашей воли и желания.',
        "5": 'Вспомните, как вы рассказывали и показывали другим людям правильное положение вещей, либо пытались продавить ситуацию в свою пользу.',
        "6": 'Вспомните, как вы не могли с чем-либо или с кем-либо смириться и принять для себя некое положение вещей как неизбежное.',
        "7": 'Вспомните как вы переживали чувство вины.',
        "8": 'Вспомните некое желание предметов либо жизненных планов, необходимость следовать моральным или иным ценностям, соблюдать запреты и выполнять инструкции.',
        "9": 'Вспомните как вы испытывали дилемму касательно того или иного материального объекта или отношений между людьми, либо как вы сами себя обманывали или уговаривали на принятие решения.',
        "10": 'Вспомните свои нереализованные жизненные планы.',
        "11": 'Вспомните перенесённые вами состояния обиды и унижения.',
        "12": 'Вспомните переживания угрозы вашей жизни - например, как вы захлебывались или не могли вдохнуть, падали или травмировались, попадали в аварию, испытывали физическое насилие над собой или ваши родители грозились отдать вас в детский дом.',
       }
// Клик по вопросу
  jQuery('.question').on('click', function(event) {
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
    } else { 
      quest_count += 1;
      jQuery(this).addClass('active');
      jQuery(this).removeClass('noactive');
      jQuery('.clear_prot').removeClass('hidden');
      jQuery('.set_acept').removeClass('hidden');
      if (quest_count == 1) {
        instruction_one = instructions[jQuery(this).data('quest_one')];
        instruction_two = instructions[jQuery(this).data('quest_two')];
      } else if (quest_count == 2) {
        instruction_three = instructions[jQuery(this).data('quest_one')];
        instruction_four = instructions[jQuery(this).data('quest_two')];
        if (instruction_three == instruction_one || instruction_three == instruction_two) {
          instruction_three = undefined;
        }
        if (instruction_four == instruction_one || instruction_four == instruction_two) {
          instruction_four = undefined;
        }
      }
      // Если выбрано 2 пункта
      if (quest_count >= 2) {
        jQuery('.noactive').addClass('hidden');
      }
    }
  });
//Отмена выбора
jQuery('.clear_prot, .stop_prot, .stop').on('click', function(event) {
  quest_count = 0;
  jQuery('.clear_prot').addClass('hidden');
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
  jQuery('.set_acept').on('click', function(event) {
    jQuery('#set').modal('hide');
    jQuery('#result').modal('show');
  });
 // Быстрее 
  jQuery('.speed_faster').on('click', function(event) {
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
  jQuery('.speed_slover').on('click', function(event) {
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
  jQuery('.start_prot').on('click', function(event) {
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
// Переключение инструкций
jQuery('.instruction_block').on('click', function(event) {
  cur_instruction += 1;
  if (cur_instruction == 2 && instruction_two) {
    jQuery('.instr').text(instruction_two);
    if (instruction_three == undefined) {
      jQuery('.close_instr').removeClass('hidden');
    jQuery('.next_instr').addClass('hidden');
    }
  } else if (cur_instruction == 3 && instruction_three) {
    jQuery('.instr').text(instruction_three);
    if (instruction_four == undefined) {
      jQuery('.close_instr').removeClass('hidden');
    jQuery('.next_instr').addClass('hidden');
    }
  } else if (cur_instruction == 4 && instruction_four) {
    jQuery('.instr').text(instruction_four);
    jQuery('.close_instr').removeClass('hidden');
    jQuery('.next_instr').addClass('hidden');
  } else {
    jQuery('.close_instr').removeClass('hidden');
    jQuery('.next_instr').addClass('hidden');
  }
});
//Закрытие окна инструкций
  jQuery('.close_instr').on('click', function(event) {
    jQuery('.instruction_block').addClass('hidden');
    jQuery('.close_instr').addClass('hidden');
    jQuery('.next_instr').removeClass('hidden');
    cur_instruction = 1;
  });
  // Пауза/Пуск
  jQuery('.play').on('click', function(event) {
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
  jQuery('.stop_prot, .stop').on('click', function(event) {
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
    cur_instruction = 1;
    jQuery('.close_instr').addClass('hidden');
    jQuery('.next_instr').removeClass('hidden');
    jQuery('.instruction_block').addClass('hidden');
  });

  jQuery('.protocol').css('height', jQuery('.protocol').css('width'));
  jQuery('.protocol svg').css('height', jQuery('.protocol svg').css('width'));
  jQuery('window').on('change', function(event) {
    jQuery('.protocol').css('height', jQuery('.protocol').css('width'));
    jQuery('.protocol svg').css('height', jQuery('.protocol svg').css('width'));
  });
  jQuery('.set_disabled').popover();
});

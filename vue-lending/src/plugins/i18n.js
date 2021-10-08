import Vue from "vue";
import VueI18n from "vue-i18n";

Vue.use(VueI18n);

export const i18n = new VueI18n({
  locale: "en",
  fallbackLocale: "ru",
  messages: {
    en: {
      menuHome: "Main",
      menuAbout: "About",
      menuServices: "Services",
      menuHow: "How We Do It",
      menuContacts: "Contacts",
      btnMenu: "Get in touch",
      mainTitle_1: "Digital Heart Of",
      mainTitle_2: "Your Business",
      mainText:
        "Qualified expertise in developing applications for all modern platforms & it’s further launch.",
      btnHome: "Let’s do it!",
      titleSpecial: "What we do",
      specialItem_1: "Websites",
      specialItem_2: "Mobile applications",
      specialItem_3: "Web applications",
      specialText_1:
        "We specialize in website development and design services as well as development of your brand style and any kind of logos. Tilda or WordPress - you choose.",
      specialText_2:
        "Looking for mobile solution? A fitness app or online marketplace? We will provide you with the best solution to drive your business forward.",
      specialText_3:
        "Online education platform or alternative to Tinder? We will do our best to provide you with the solution you exactly need,",
      specialText_3_br: "leveraging our skills and a piece of our soul.",
      titleMeet: "Meet our team",
      meetStrong_1: "We are the team of progressive dreamers,",
      meetText_1:
        "inspired by modern startups and innovative technologies of IT sphere. We deliver the most progressive technologies into existing businesses, thus introducting a digitalized booster and upgrade that satisfies the business needs of our clients and their clients as well. We develop an innovative solutions for companies transferring existing offline processes to online. Let’s go digital! We also help startups to achieve their goals as well.",
      meetStrong_2: "Our key capabilities:",
      meetTextList_1: "1. Friendly communication",
      meetTextList_2:
        "2. Complete indictaion and implementation of your essential needs",
      meetTextList_3:
        "3. Project ends only in case you are fully satisfied with it",
      meetTextList_4:
        "4. We are open to a long time cooperation, not only a one-time project",
      meetText_2: "So who we are?",
      meetStrong_3: "We are your turbo-booster towards digitalization!",
      titleBanner_1: "Let’s have a great product",
      titleBanner_2: "together!",
      formPlaceholderName: "Name",
      formPlaceholderMobile: "Phone",
      chooseTitle: "Why we?",
      chooseTitle_1: "Just in time",
      chooseText_1:
        "We know how sweet managers’ promises could be. That’s why we don’t shift responsibility, ",
      chooseTextStrong_1: "as we are in charge for all processes personally. ",
      chooseTitle_2: "Always online",
      chooseText_2: "And that is not just a words, we do this for real. ",
      chooseTextStrong_2: "Your business is our #1 priority",
      chooseText_2_2: "and we will do our best to fit your schedule.",
      chooseTitle_3: "Fruitful cooperation",
      chooseText_3:
        "You look forward to get the result as if we were doing this for ourselves? With our team you could get even more,",
      chooseStrong: " — we always enjoy to do an extra mile.",
      chooseTitle_4: "Your goal is our priority",
      chooseText_4: "Make each project succesful is our top priority, ",
      titleProcess: "And the process?",
      cardTitle_1: "Prototype",
      prototypeItem_1: "Briefing",
      prototypeItem_2: "Communication with costumer",
      prototypeItem_3: "Prototyping",
      cardTitle_2: "Research",
      researchItem_1: "Search for references",
      researchItem_2: "Brainstorming",
      researchItem_3: "Concept",
      cardTitle_3: "Design",
      designItem_1: "Fonts",
      designItem_2: "Color palette",
      designItem_3: "Creative UI",
      cardTitle_4: "Adaptiveness",
      adaptivItem_1: "Version for tabs",
      adaptivItem_2: "Mobile version",
      quote: "No common phrases, empty promises and indifferent attitude",
      footerFormTitle: "Ready to talk?",
      footerBtn: "Call me back",
      footerOnline_1: "We are ",
      footerOnline_2: "online ",
      always: "always",
      footerPrivacy: "Privacy policy",
      footerReserved: '© "Soft Boost". All rights reserved',
      modalHeader: "Leave your contacts and we will contact you",
      email: "Email",
      bannerBtn: "Get in touch",
      chooseTextStrong_4: "as we grow together with you!"
    },
    ru: {
      menuHome: "Главная",
      menuAbout: "О нас",
      menuServices: "Почему мы?",
      menuHow: "Как работаем?",
      menuContacts: "Контакты",
      btnMenu: "Пообщаемся?",
      mainTitle_1: "Цифровое сердце",
      mainTitle_2: "вашего бизнеса",
      mainText:
        "Качественно разработаем приложения на современных платформах и запустим его вместе .",
      btnHome: "Хочу сотрудничать!",
      titleSpecial: "Что мы делаем?",
      specialItem_1: "Сайты",
      specialItem_2: "Мобильные приложения",
      specialItem_3: "Веб - приложения",
      specialText_1:
        "Создание дизайна, фирменного стиля, всевозможных логотипов и, конечно, разработка. На Тильде или ВордПресс — выбор всегда остаётся за вами.",
      specialText_2:
        "Ищите решение для смартфонов? Приложение для фитнеса, или площадка для продажи в онлайне? Мы сможем найти точки соприкосновения в каждой нише.",
      specialText_3: "Платформа для онлайн обучения? Или альтернативу тиндеру?",
      specialText_3_br:
        "Мы создадим для вас то, что вам нужно, вкладывая туда свои знания и часть души.",
      titleMeet: "Давайте знакомиться",
      meetStrong_1: "Мы - команда прогрессивных мечтателей,",
      meetText_1:
        " которые вдохновляются современными стартапами и технологиями на рынке IT. Мы интегрируем прогрессивные технологии в существующие бизнесы, создаем некий диджитализированый бустер и апгрейд, который утоляет бизнес потребность нашего клиента, а в последствии и его клиентов. Совместно с командой разрабатываем инновационное для компаний решение переводя существующие оффлайн процессы в онлайн. Так же помогаем стартапам в реализации задуманной идеи.",
      meetStrong_2: "Нашими особенностями являются:",
      meetTextList_1: "1. Френдли коммуникация с заказчиком ",
      meetTextList_2: "2. Полное выявление потребности ",
      meetTextList_3:
        "3. Завершаем проект только при 100% удовлетворении заказчика",
      meetTextList_4:
        "4. Заводим отношения не на единоразовой основе, а на долгие-долгие периоды сотрудничества",
      meetText_2: "Так все же кто мы? ",
      meetStrong_3: "Мы - твой турбо-ускоритель в диджитализации",
      titleBanner_1: "Сделаем крутой продукт",
      titleBanner_2: "вместе",
      formPlaceholderName: "Имя",
      formPlaceholderMobile: "Телефон",
      chooseTitle: "Почему мы?",
      chooseTitle_1: "Точно в срок",
      chooseText_1:
        "Мы знаем, как умеют обещать “менеджеры”, поэтому не перекладываем ответственность.",
      chooseTextStrong_1:
        "Все процессы контроллируем лично, и несем за них ответственность.",
      chooseTitle_2: "Всегда на связи",
      chooseTextStrong_2: "Вы — наш приоритет,",
      chooseText_2: "Это не просто слова, а реальные действия.",
      chooseText_2_2:
        "поэтому все планы подстраиваем так, чтобы удобно было Вам.",
      chooseTitle_3: "Сотрудничество, которое порадует",
      chooseStrong: "— результат на 100% и еще чуть чуть сверху.",

      chooseText_3:
        "Ждете от сотрудничества такой отдачи, будто делаем проект для себя? С нами вы получите больше, ведь главное ",
      chooseTitle_4: "Ваши достижения — наша цель",
      chooseText_4: "Наша цель — привести каждый проект к успеху, ведь ",
      chooseTextStrong_4: " вместе с вами растем и развиваемся и мы!",
      titleProcess: "А процесс?",
      cardTitle_1: "Прототип",
      prototypeItem_1: "Брифинг",
      prototypeItem_2: "Общение с заказчиком",
      prototypeItem_3: "Прототипирование",
      cardTitle_2: "Исследование",
      researchItem_1: "Поиск референсов",
      researchItem_2: "Брейншторм",
      researchItem_3: "Концепт",
      cardTitle_3: "Создание дизайна",
      designItem_1: "Подбор шрифтов",
      designItem_2: "Подбор цветовой палитры",
      designItem_3: "Создание креативного UI",
      cardTitle_4: "Отзывчивость",
      adaptivItem_1: "Версия для планшета",
      adaptivItem_2: "Мобильная версия",
      quote: "Никаких общих фраз, пустых обещаний и равнодушного отношения ",
      footerFormTitle: "Готовы пообщаться?",
      footerBtn: "Перезвоните мне",
      footerOnline_1: "Мы ",
      footerOnline_2: "на связи",

      footerPrivacy: "Политика конфеденциальности",
      footerReserved: '© "Soft Boost". Все права защищены',
      modalHeader: "Оставьте контакты и мы с вами свяжемся",
      email: "Почта",
      modalBtn: "Отправить",
      bannerBtn: "Общаться",
      always: "всегда"
    }
  }
});

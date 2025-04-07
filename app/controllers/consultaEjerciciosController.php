<?php

class ConsultaEjerciciosController {
    private $ejercicios = [
        'pecho' => [
            1 => [
                'nombre' => 'Press de Banca',
                'imagen' => 'img/pressbanca.jpg',
                'descripcion' => 'El press de banca es un ejercicio compuesto que trabaja principalmente el pecho, hombros y tríceps.',
                'pasos' => [
                    'Acuéstate en el banco con los pies planos en el suelo',
                    'Agarra la barra con un agarre ligeramente más ancho que los hombros',
                    'Baja la barra controladamente hasta tocar el pecho',
                    'Empuja la barra hacia arriba hasta extender completamente los brazos'
                ],
                'video' => 'https://www.youtube.com/watch?v=XSza8hVTlmM'
            ],
            2 => [
                'nombre' => 'Press Inclinado',
                'imagen' => 'img/pressInclinado.jpg',
                'descripcion' => 'El press inclinado es un ejercicio que trabaja el pecho y los hombros.',
                'pasos' => [
                    'Acuéstate en el banco inclinado',
                    'Agarra la barra con un agarre ligeramente más ancho que los hombros',
                    'Baja la barra controladamente hasta tocar el pecho',
                    'Empuja la barra hacia arriba hasta extender completamente los brazos'
                ],
                'video' => 'https://www.youtube.com/watch?v=XSza8hVTlmM'
            ],
            3 => [
                'nombre' => 'Press Declinado',
                'imagen' => 'img/pressdeclinado.jpg',
                'descripcion' => 'El press declinado es un ejercicio que trabaja el pecho y los hombros.',
                'pasos' => [
                    'Acuéstate en el banco inclinado',
                    'Agarra la barra con un agarre ligeramente más ancho que los hombros',
                    'Baja la barra controladamente hasta tocar el pecho',
                    'Empuja la barra hacia arriba hasta extender completamente los brazos'
                ],
                'video' => 'https://www.youtube.com/watch?v=XSza8hVTlmM'
            ],
            4 => [
                'nombre' => 'Aperturas con Mancuernas',
                'imagen' => 'img/aperturasmancuernas.jpg',
                'descripcion' => 'Las aperturas con mancuernas son un ejercicio que trabaja el pecho y los hombros.',
                'pasos' => [
                    'Acuéstate en el banco con los pies planos en el suelo',
                    'Agarra las mancuernas con los brazos extendidos',
                    'Abre las mancuernas hasta que los brazos estén paralelos al suelo',
                    'Contrae los brazos para volver a la posición inicial'
                ],
                'video' => 'https://www.youtube.com/watch?v=XSza8hVTlmM'
            ],
            5 => [
                'nombre' => 'Fondos en Paralelas',
                'imagen' => 'img/banca.png',
                'descripcion' => 'Los fondos en paralelas son un ejercicio que trabaja el pecho y los hombros.',
                'pasos' => [
                    'Acuéstate en el banco con los pies planos en el suelo',
                    'Agarra la barra con los brazos extendidos',
                    'Baja la barra controladamente hasta tocar el pecho',
                    'Empuja la barra hacia arriba hasta extender completamente los brazos'
                ],
                'video' => 'https://www.youtube.com/watch?v=XSza8hVTlmM'
            ],
            6 => [
                'nombre' => 'Press con Mancuernas',
                'imagen' => 'img/pressmancuernas.jpg',
                'descripcion' => 'El press con mancuernas es un ejercicio que trabaja el pecho y los hombros.',
                'pasos' => [
                    'Acuéstate en el banco con los pies planos en el suelo',
                    'Agarra las mancuernas con los brazos extendidos',
                    'Baja las mancuernas controladamente hasta tocar el pecho',
                    'Empuja las mancuernas hacia arriba hasta extender completamente los brazos'
                ],
                'video' => 'https://www.youtube.com/watch?v=XSza8hVTlmM'
            ],
            7 => [
                'nombre' => 'Pullover',
                'imagen' => 'img/pull.jpg',
                'descripcion' => 'El pullover es un ejercicio que trabaja el pecho y los hombros.',
                'pasos' => [
                    'Acuéstate en el banco con los pies planos en el suelo',
                    'Agarra la barra con los brazos extendidos',
                    'Baja la barra controladamente hasta tocar el pecho',
                    'Empuja la barra hacia arriba hasta extender completamente los brazos'
                ],
                'video' => 'https://www.youtube.com/watch?v=XSza8hVTlmM'
            ],
            8 => [
                'nombre' => 'Cruce de Poleas',
                'imagen' => 'img/curecepoleas.jpg',
                'descripcion' => 'El cruce de poleas es un ejercicio que trabaja el pecho y los hombros.',
                'pasos' => [
                    'Acuéstate en el banco con los pies planos en el suelo',
                    'Agarra la barra con los brazos extendidos',
                    'Baja la barra controladamente hasta tocar el pecho',
                    'Empuja la barra hacia arriba hasta extender completamente los brazos'
                ],
                'video' => 'https://www.youtube.com/watch?v=XSza8hVTlmM'
            ],
            9 => [
                'nombre' => 'Press Hammer',
                'imagen' => 'img/presshammer.jpg',
                'descripcion' => 'El press hammer es un ejercicio que trabaja el pecho y los hombros.',
                'pasos' => [
                    'Acuéstate en el banco con los pies planos en el suelo',
                    'Agarra la barra con los brazos extendidos',
                    'Baja la barra controladamente hasta tocar el pecho',
                    'Empuja la barra hacia arriba hasta extender completamente los brazos'
                ],
                'video' => 'https://www.youtube.com/watch?v=XSza8hVTlmM'
            ],
            10 => [
                'nombre' => 'Push-Ups',
                'imagen' => 'img/push.jpg',
                'descripcion' => 'Los push-ups son un ejercicio que trabaja el pecho y los hombros.',
                'pasos' => [
                    'Acuéstate en el suelo o en un banco',
                    'Extiende los brazos hacia adelante',
                    'Baja hasta que el pecho toca el suelo',
                    'Empuja hacia arriba hasta extender completamente los brazos'
                ],
                'video' => 'https://www.youtube.com/watch?v=XSza8hVTlmM'
            ],
        ],
        'espalda' => [
            11 => [
                'nombre' => 'Dominadas',
                'imagen' => 'img/dominadas.jpg',
                'descripcion' => 'Las dominadas son un ejercicio excelente para desarrollar la espalda y los brazos.',
                'pasos' => [
                    'Agarra la barra con las palmas hacia adelante',
                    'Cuelga completamente con los brazos extendidos',
                    'Tira de tu cuerpo hacia arriba hasta que tu barbilla supere la barra',
                    'Baja controladamente hasta la posición inicial'
                ],
                'video' => 'https://www.youtube.com/watch?v=eGo4IYlbE5g'
            ],
            12 => [
                'nombre' => 'Remo con Barra',
                'imagen' => 'img/remo.jpg',
                'descripcion' => 'El remo con barra es excelente para desarrollar la espalda media.',
                'pasos' => [
                    'Inclínate hacia adelante con la espalda recta',
                    'Agarra la barra con las palmas hacia abajo',
                    'Tira de la barra hacia tu abdomen bajo',
                    'Baja controladamente manteniendo la tensión'
                ],
                'video' => 'https://www.youtube.com/watch?v=G8l_8chR5BE'
            ],
            13 => [
                'nombre' => 'Jalón al Pecho',
                'imagen' => 'img/jalon.jpg',
                'descripcion' => 'El jalon al pecho es un ejercicio que trabaja la espalda y los hombros.',
                'pasos' => [
                    'Acuéstate en el suelo o en un banco',
                    'Agarra la barra con los brazos extendidos',
                    'Baja la barra controladamente hasta tocar el pecho',
                    'Empuja la barra hacia arriba hasta extender completamente los brazos'
                ],
                'video' => 'https://www.youtube.com/watch?v=XSza8hVTlmM'
            ],
            14 => [
                'nombre' => 'Remo con Mancuerna',
                'imagen' => 'img/remomancuerna.jpg',
                'descripcion' => 'El remo con mancuerna es un ejercicio que trabaja la espalda y los hombros.',
                'pasos' => [
                    'Acuéstate en el suelo o en un banco',
                    'Agarra la mancuerna con los brazos extendidos',
                    'Baja la mancuerna controladamente hasta tocar el pecho',
                    'Empuja la mancuerna hacia arriba hasta extender completamente los brazos'
                ],
                'video' => 'https://www.youtube.com/watch?v=XSza8hVTlmM'
            ],
            15 => [
                'nombre' => 'Pull-ups',
                'imagen' => 'img/ups.jpg',
                'descripcion' => 'Los pull-ups son un ejercicio excelente para desarrollar la espalda y los brazos.',
                'pasos' => [
                    'Agarra la barra con las manos hacia adelante',
                    'Cuelga completamente con los brazos extendidos',
                    'Tira de tu cuerpo hacia arriba hasta que tu barbilla supere la barra',
                    'Baja controladamente hasta la posición inicial'
                ],
                'video' => 'https://www.youtube.com/watch?v=eGo4IYlbE5g'
            ],
            16 => [
                'nombre' => 'Remo en Máquina',
                'imagen' => 'img/remomaquina.jpg',
                'descripcion' => 'El remo en máquina es un ejercicio que trabaja la espalda y los hombros.',
                'pasos' => [
                    'Acuéstate en la máquina de remo',
                    'Agarra la barra con las manos',
                    'Tira de la barra hacia tu abdomen bajo',
                    'Baja controladamente manteniendo la tensión'
                ],
                'video' => 'https://www.youtube.com/watch?v=G8l_8chR5BE'
            ],
            17 => [
                'nombre' => 'Hiperextensiones',
                'imagen' => 'img/hiper.jpg',
                'descripcion' => 'Las hiperextensiones son un ejercicio que trabaja la espalda y los glúteos.',
                'pasos' => [
                    'Acuéstate en la máquina de hiperextensiones',
                    'Agarra la barra con las manos',
                    'Tira de la barra hacia arriba hasta extender completamente los brazos',
                    'Baja controladamente manteniendo la tensión'
                ],
                'video' => 'https://www.youtube.com/watch?v=1ZXobu7JvvE'
            ],
            18 => [
                'nombre' => 'Face Pull',
                'imagen' => 'img/face.jpg',
                'descripcion' => 'El face pull es un ejercicio que trabaja la espalda y los hombros.',
                'pasos' => [
                    'Acuéstate en el suelo o en un banco',
                    'Agarra la barra con las manos',
                    'Tira de la barra hacia arriba hasta extender completamente los brazos',
                    'Baja controladamente manteniendo la tensión'
                ],
                'video' => 'https://www.youtube.com/watch?v=1ZXobu7JvvE'
            ],
            19 => [
                'nombre' => 'Remo Meadows',
                'imagen' => 'img/banca.png',
                'descripcion' => 'El remo meadows es un ejercicio que trabaja la espalda y los glúteos.',
                'pasos' => [
                    'Acuéstate en el suelo o en un banco',
                    'Agarra la barra con las manos',
                    'Tira de la barra hacia arriba hasta extender completamente los brazos',
                    'Baja controladamente manteniendo la tensión'
                ],
                'video' => 'https://www.youtube.com/watch?v=1ZXobu7JvvE'
            ],
            20 => [
                'nombre' => 'Good Morning',
                'imagen' => 'img/banca.png',
                'descripcion' => 'El good morning es un ejercicio que trabaja la espalda y los glúteos.',
                'pasos' => [
                    'Acuéstate en el suelo o en un banco',
                    'Agarra la barra con las manos',
                    'Tira de la barra hacia arriba hasta extender completamente los brazos',
                    'Baja controladamente manteniendo la tensión'
                ],
                'video' => 'https://www.youtube.com/watch?v=1ZXobu7JvvE'
            ],
        ],
        'piernas' => [
            21 => [
                'nombre' => 'Sentadilla',
                'imagen' => 'img/sentadillaa.jpg',
                'descripcion' => 'La sentadilla es un ejercicio fundamental que trabaja principalmente piernas y glúteos.',
                'pasos' => [
                    'Coloca la barra en los trapecios',
                    'Mantén la espalda recta y el core activado',
                    'Flexiona las rodillas manteniendo las rodillas alineadas con los pies',
                    'Baja hasta que los muslos estén paralelos al suelo'
                ],
                'video' => 'https://www.youtube.com/watch?v=aclHkVaku9U'
            ],
            22 => [
                'nombre' => 'Peso Muerto',
                'imagen' => 'img/peso.jpg',
                'descripcion' => 'El peso muerto es un ejercicio que trabaja toda la cadena posterior del cuerpo.',
                'pasos' => [
                    'Colócate frente a la barra con los pies a la altura de las caderas',
                    'Flexiona las caderas y rodillas manteniendo la espalda recta',
                    'Agarra la barra con un agarre mixto o doble pronación',
                    'Levanta la barra manteniendo la espalda recta y los brazos extendidos'
                ],
                'video' => 'https://www.youtube.com/watch?v=1ZXobu7JvvE'
            ],
            23 => [
                'nombre' => 'Hip Thrust',
                'imagen' => 'img/hip.jpg',
                'descripcion' => 'El hip thrust es el mejor ejercicio para desarrollar los glúteos.',
                'pasos' => [
                    'Siéntate con la espalda apoyada en un banco',
                    'Coloca la barra sobre las caderas con protección',
                    'Empuja con los talones y eleva las caderas',
                    'Baja controladamente manteniendo la tensión'
                ],
                'video' => 'https://www.youtube.com/watch?v=Zp26q4BY5HE'
            ],
            24 => [
                'nombre' => 'Prensa de Piernas',
                'imagen' => 'img/premsa.jpg',
                'descripcion' => 'La prensa de piernas es un ejercicio que trabaja los músculos de las piernas.',
                'pasos' => [
                    'Acuéstate en la prensa de piernas',
                    'Coloca las piernas en la plataforma',
                    'Ajusta la posición de las piernas y las caderas',
                    'Aplica la carga y realiza la contracción'
                ],
                'video' => 'https://www.youtube.com/watch?v=XSza8hVTlmM'
            ],
            25 => [
                'nombre' => 'Extensiones de Cuádriceps',
                'imagen' => 'img/cuadriceps.jpg',
                'descripcion' => 'Las extensiones de cuádriceps son un ejercicio que trabaja los músculos de las piernas.',
                'pasos' => [
                    'Acuéstate en la máquina de extensiones de cuádriceps',
                    'Coloca las piernas en la plataforma',
                    'Ajusta la posición de las piernas y las caderas',
                    'Aplica la carga y realiza la contracción'
                ],
                'video' => 'https://www.youtube.com/watch?v=XSza8hVTlmM'
            ],
            26 => [
                'nombre' => 'Curl de Isquiotibiales',
                'imagen' => 'img/isquios.jpeg',
                'descripcion' => 'El curl de isquiotibiales es un ejercicio que trabaja los músculos de las piernas.',
                'pasos' => [
                    'Acuéstate en la máquina de curls de isquiotibiales',
                    'Coloca las piernas en la plataforma',
                    'Ajusta la posición de las piernas y las caderas',
                    'Aplica la carga y realiza la contracción'
                ],
                'video' => 'https://www.youtube.com/watch?v=XSza8hVTlmM'
            ],
            27 => [
                'nombre' => 'Elevación de Gemelos',
                'imagen' => 'img/gemelos.jpg',
                'descripcion' => 'La elevación de gemelos es un ejercicio que trabaja los músculos de las piernas.',
                'pasos' => [
                    'Acuéstate en la máquina de elevación de gemelos',
                    'Coloca las piernas en la plataforma',
                    'Ajusta la posición de las piernas y las caderas',
                    'Aplica la carga y realiza la contracción'
                ],
                'video' => 'https://www.youtube.com/watch?v=XSza8hVTlmM'
            ],
            28 => [
                'nombre' => 'Zancadas',
                'imagen' => 'img/zancadas.jpg',
                'descripcion' => 'Las zancadas son un ejercicio que trabaja los músculos de las piernas.',
                'pasos' => [
                    'Coloca las piernas frente a una silla o escalón',
                    'Coloca los pies en la silla o escalón',
                    'Baja hasta que las piernas estén paralelas al suelo',
                    'Empuja hacia arriba hasta extender completamente las piernas'
                ],
                'video' => 'https://www.youtube.com/watch?v=XSza8hVTlmM'
            ],
            29 => [
                'nombre' => 'Sentadilla Búlgara',
                'imagen' => 'img/bulgara.jpg',
                'descripcion' => 'La sentadilla búlgara es un ejercicio que trabaja los músculos de las piernas.',
                'pasos' => [
                    'Coloca las piernas frente a una silla o escalón',
                    'Coloca los pies en la silla o escalón',
                    'Baja hasta que las piernas estén paralelas al suelo',
                    'Empuja hacia arriba hasta extender completamente las piernas'
                ],
                'video' => 'https://www.youtube.com/watch?v=XSza8hVTlmM'
            ],
            30 => [
                'nombre' => 'Aductores',
                'imagen' => 'img/aductores.jpg',
                'descripcion' => 'Los aductores son un ejercicio que trabaja los músculos de las piernas.',
                'pasos' => [
                    'Coloca las piernas frente a una silla o escalón',
                    'Coloca los pies en la silla o escalón',
                    'Baja hasta que las piernas estén paralelas al suelo',
                    'Empuja hacia arriba hasta extender completamente las piernas'
                ],
                'video' => 'https://www.youtube.com/watch?v=XSza8hVTlmM'
            ],
        ],
        'brazos' => [
            31 => [
                'nombre' => 'Curl de Bíceps',
                'imagen' => 'img/biceps.jpg',
                'descripcion' => 'El curl de bíceps es el ejercicio clásico para desarrollar los brazos.',
                'pasos' => [
                    'De pie, sostén las mancuernas con los brazos extendidos',
                    'Mantén los codos pegados al cuerpo',
                    'Flexiona los brazos llevando el peso hacia los hombros',
                    'Baja controladamente a la posición inicial'
                ],
                'video' => 'https://www.youtube.com/watch?v=ykJmrZ5v0Oo'
            ],
            32 => [
                'nombre' => 'Extensión de Tríceps',
                'imagen' => 'img/extension.jpg',
                'descripcion' => 'La extensión de tríceps es fundamental para desarrollar la parte posterior del brazo.',
                'pasos' => [
                    'Sostén una mancuerna con ambas manos sobre la cabeza',
                    'Flexiona los codos manteniendo los brazos cerca de las orejas',
                    'Extiende completamente los brazos',
                    'Baja controladamente manteniendo la posición'
                ],
                'video' => 'https://www.youtube.com/watch?v=_gsUck-7M74'
            ],
            33 => [
                'nombre' => 'Curl Martillo',
                'imagen' => 'img/martillo.jpg',
                'descripcion' => 'El curl martillo es un ejercicio que trabaja los músculos del brazo.',
                'pasos' => [
                    'De pie, sostén la mancuerna con la mano',
                    'Mantén el brazo extendido',
                    'Flexiona el brazo llevando el peso hacia los hombros',
                    'Baja controladamente a la posición inicial'
                ],
                'video' => 'https://www.youtube.com/watch?v=XSza8hVTlmM'
            ],
            34 => [
                'nombre' => 'Press Francés',
                'imagen' => 'img/frances.jpg',
                'descripcion' => 'El press francés es un ejercicio que trabaja los músculos del brazo.',
                'pasos' => [
                    'Acuéstate en el banco con los pies planos en el suelo',
                    'Agarra la barra con las manos',
                    'Baja la barra controladamente hasta tocar el pecho',
                    'Empuja la barra hacia arriba hasta extender completamente los brazos'
                ],
                'video' => 'https://www.youtube.com/watch?v=XSza8hVTlmM'
            ],
            35 => [
                'nombre' => 'Curl con Barra Z',
                'imagen' => 'img/z.jpg',
                'descripcion' => 'El curl con barra Z es un ejercicio que trabaja los músculos del brazo.',
                'pasos' => [
                    'Acuéstate en el banco con los pies planos en el suelo',
                    'Agarra la barra con las manos',
                    'Baja la barra controladamente hasta tocar el pecho',
                    'Empuja la barra hacia arriba hasta extender completamente los brazos'
                ],
                'video' => 'https://www.youtube.com/watch?v=XSza8hVTlmM'
            ],
            36 => [
                'nombre' => 'Extensiones en Polea',
                'imagen' => 'img/extension.jpg',
                'descripcion' => 'Las extensiones en polea son un ejercicio que trabaja los músculos del brazo.',
                'pasos' => [
                    'Acuéstate en la máquina de extensiones en polea',
                    'Coloca las manos en la barra',
                    'Ajusta la posición de las manos',
                    'Aplica la carga y realiza la contracción'
                ],
                'video' => 'https://www.youtube.com/watch?v=XSza8hVTlmM'
            ],
            37 => [
                'nombre' => 'Curl Scott',
                'imagen' => 'img/curl.jpg',
                'descripcion' => 'El curl Scott es un ejercicio que trabaja los músculos del brazo.',
                'pasos' => [
                    'Acuéstate en el banco con los pies planos en el suelo',
                    'Agarra la barra con las manos',
                    'Baja la barra controladamente hasta tocar el pecho',
                    'Empuja la barra hacia arriba hasta extender completamente los brazos'
                ],
                'video' => 'https://www.youtube.com/watch?v=XSza8hVTlmM'
            ],
            38 => [
                'nombre' => 'Fondos en Banco',
                'imagen' => 'img/fondos.jpg',
                'descripcion' => 'Los fondos en banco son un ejercicio que trabaja los músculos del brazo.',
                'pasos' => [
                    'Acuéstate en el banco con los pies planos en el suelo',
                    'Agarra la barra con las manos',
                    'Baja la barra controladamente hasta tocar el pecho',
                    'Empuja la barra hacia arriba hasta extender completamente los brazos'
                ],
                'video' => 'https://www.youtube.com/watch?v=XSza8hVTlmM'
            ],
            39 => [
                'nombre' => 'Curl de Concentración',
                'imagen' => 'img/banca.png',
                'descripcion' => 'El curl de concentración es un ejercicio que trabaja los músculos del brazo.',
                'pasos' => [
                    'Acuéstate en el banco con los pies planos en el suelo',
                    'Agarra la barra con las manos',
                    'Baja la barra controladamente hasta tocar el pecho',
                    'Empuja la barra hacia arriba hasta extender completamente los brazos'
                ],
                'video' => 'https://www.youtube.com/watch?v=XSza8hVTlmM'
            ],
            40 => [
                'nombre' => 'Extensiones sobre la Cabeza',
                'imagen' => 'img/banca.png',
                'descripcion' => 'Las extensiones sobre la cabeza son un ejercicio que trabaja los músculos del brazo.',
                'pasos' => [
                    'Acuéstate en el banco con los pies planos en el suelo',
                    'Agarra la barra con las manos',
                    'Baja la barra controladamente hasta tocar el pecho',
                    'Empuja la barra hacia arriba hasta extender completamente los brazos'
                ],
                'video' => 'https://www.youtube.com/watch?v=XSza8hVTlmM'
            ],
        ],
        'core' => [
            41 => [
                'nombre' => 'Plancha',
                'imagen' => 'img/plancha.jpg',
                'descripcion' => 'La plancha es un ejercicio isométrico excelente para fortalecer el core.',
                'pasos' => [
                    'Apóyate sobre los antebrazos y las puntas de los pies',
                    'Mantén el cuerpo en línea recta desde la cabeza hasta los talones',
                    'Contrae el core y los glúteos',
                    'Mantén la posición durante el tiempo establecido'
                ],
                'video' => 'https://www.youtube.com/watch?v=ASdvN_XEl_c'
            ],
            42 => [
                'nombre' => 'Crunch',
                'imagen' => 'img/crunch.jpg',
                'descripcion' => 'El crunch es un ejercicio que trabaja el core.',
                'pasos' => [
                    'Acuéstate en el suelo o en un banco',
                    'Agarra las manos detrás de la cabeza',
                    'Levanta las piernas y flexiona las rodillas',
                    'Contrae el core y los glúteos'
                ],
                'video' => 'https://www.youtube.com/watch?v=XSza8hVTlmM'
            ],
            43 => [
                'nombre' => 'Russian Twist',
                'imagen' => 'img/russian.jpg',
                'descripcion' => 'El Russian twist es un ejercicio que trabaja el core.',
                'pasos' => [
                    'Acuéstate en el suelo o en un banco',
                    'Agarra las manos detrás de la cabeza',
                    'Levanta las piernas y flexiona las rodillas',
                    'Contrae el core y los glúteos'
                ],
                'video' => 'https://www.youtube.com/watch?v=XSza8hVTlmM'
            ],
            44 => [
                'nombre' => 'Elevación de Piernas',
                'imagen' => 'img/elevacion.jpg',
                'descripcion' => 'La elevación de piernas es un ejercicio que trabaja el core.',
                'pasos' => [
                    'Acuéstate en el suelo o en un banco',
                    'Agarra las manos detrás de la cabeza',
                    'Levanta las piernas y flexiona las rodillas',
                    'Contrae el core y los glúteos'
                ],
                'video' => 'https://www.youtube.com/watch?v=XSza8hVTlmM'
            ],
            45 => [
                'nombre' => 'Plancha Lateral',
                'imagen' => 'img/lateral.jpg',
                'descripcion' => 'La plancha lateral es un ejercicio que trabaja el core.',
                'pasos' => [
                    'Acuéstate en el suelo o en un banco',
                    'Agarra las manos detrás de la cabeza',
                    'Levanta las piernas y flexiona las rodillas',
                    'Contrae el core y los glúteos'
                ],
                'video' => 'https://www.youtube.com/watch?v=XSza8hVTlmM'
            ],
            46 => [
                'nombre' => 'Dragon Flag',
                'imagen' => 'img/dragon.jpg',
                'descripcion' => 'El dragon flag es un ejercicio que trabaja el core.',
                'pasos' => [
                    'Acuéstate en el suelo o en un banco',
                    'Agarra las manos detrás de la cabeza',
                    'Levanta las piernas y flexiona las rodillas',
                    'Contrae el core y los glúteos'
                ],
                'video' => 'https://www.youtube.com/watch?v=XSza8hVTlmM'
            ],
            47 => [
                'nombre' => 'Ab Wheel',
                'imagen' => 'img/wheel.jpg',
                'descripcion' => 'El ab wheel es un ejercicio que trabaja el core.',
                'pasos' => [
                    'Acuéstate en el suelo o en un banco',
                    'Agarra las manos detrás de la cabeza',
                    'Levanta las piernas y flexiona las rodillas',
                    'Contrae el core y los glúteos'
                ],
                'video' => 'https://www.youtube.com/watch?v=XSza8hVTlmM'
            ],
            48 => [
                'nombre' => 'Pallof Press',
                'imagen' => 'img/banca.png',
                'descripcion' => 'El pallof press es un ejercicio que trabaja el core.',
                'pasos' => [
                    'Acuéstate en el suelo o en un banco',
                    'Agarra las manos detrás de la cabeza',
                    'Levanta las piernas y flexiona las rodillas',
                    'Contrae el core y los glúteos'
                ],
                'video' => 'https://www.youtube.com/watch?v=XSza8hVTlmM'
            ],
            49 => [
                'nombre' => 'Hollow Hold',
                'imagen' => 'img/banca.png',
                'descripcion' => 'El hollow hold es un ejercicio que trabaja el core.',
                'pasos' => [
                    'Acuéstate en el suelo o en un banco',
                    'Agarra las manos detrás de la cabeza',
                    'Levanta las piernas y flexiona las rodillas',
                    'Contrae el core y los glúteos'
                ],
                'video' => 'https://www.youtube.com/watch?v=XSza8hVTlmM'
            ],
            50 => [
                'nombre' => 'Wood Chops',
                'imagen' => 'img/banca.png',
                'descripcion' => 'El wood chops es un ejercicio que trabaja el core.',
                'pasos' => [
                    'Acuéstate en el suelo o en un banco',
                    'Agarra las manos detrás de la cabeza',
                    'Levanta las piernas y flexiona las rodillas',
                    'Contrae el core y los glúteos'
                ],
                'video' => 'https://www.youtube.com/watch?v=XSza8hVTlmM'
            ],
        ],
    ];

    public function index() {
        $ejerciciosPorGrupo = $this->ejercicios;
        require_once __DIR__ . '/../views/auth/consultaEjercicios.php';
    }

    public function verEjercicio($id) {
        foreach ($this->ejercicios as $grupo) {
            if (isset($grupo[$id])) {
                header('Content-Type: application/json');
                echo json_encode($grupo[$id]);
                return;
            }
        }
    }
}

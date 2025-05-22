<?php

class ConsultaEjerciciosController {
    private $ejercicios = [
        'pecho' => [
            1 => [
                'nombre' => 'Press de Banca',
                'imagen' => 'img/pressbanca.jpg',
                'descripcion' => 'El press de banca es el ejercicio principal para desarrollar fuerza y masa en el pectoral mayor, involucrando también tríceps y deltoides anteriores.',
                'pasos' => [
                    'Acuéstate en el banco con los pies planos en el suelo',
                    'Agarra la barra con un agarre ligeramente más ancho que los hombros',
                    'Baja la barra controladamente hasta tocar el pecho',
                    'Empuja la barra hacia arriba hasta extender completamente los brazos'
                ],
                'video' => 'https://www.youtube.com/watch?v=rT7DgCr-3pg'
            ],
            2 => [
                'nombre' => 'Press Inclinado',
                'imagen' => 'img/pressInclinado.jpg',
                'descripcion' => 'El press inclinado enfatiza la parte superior del pectoral mayor y los deltoides frontales, ideal para un pecho más completo.',
                'pasos' => [
                    'Acuéstate en el banco inclinado',
                    'Agarra la barra con un agarre ligeramente más ancho que los hombros',
                    'Baja la barra controladamente hasta tocar el pecho',
                    'Empuja la barra hacia arriba hasta extender completamente los brazos'
                ],
                'video' => 'https://www.youtube.com/watch?v=8iPEnn-ltC8'
            ],
            3 => [
                'nombre' => 'Press Declinado',
                'imagen' => 'img/pressdeclinado.jpg',
                'descripcion' => 'El press declinado enfatiza la parte inferior del pectoral mayor y permite levantar más peso que el press plano.',
                'pasos' => [
                    'Acuéstate en el banco inclinado',
                    'Agarra la barra con un agarre ligeramente más ancho que los hombros',
                    'Baja la barra controladamente hasta tocar el pecho',
                    'Empuja la barra hacia arriba hasta extender completamente los brazos'
                ],
                'video' => 'https://www.youtube.com/watch?v=5A7qG5tlbJo'
            ],
            4 => [
                'nombre' => 'Aperturas con Mancuernas',
                'imagen' => 'img/aperturasmancuernas.jpg',
                'descripcion' => 'Las aperturas con mancuernas aíslan el pectoral mayor y estiran el músculo, mejorando la flexibilidad y la forma del pecho.',
                'pasos' => [
                    'Acuéstate en el banco con los pies planos en el suelo',
                    'Agarra las mancuernas con los brazos extendidos',
                    'Abre las mancuernas hasta que los brazos estén paralelos al suelo',
                    'Contrae los brazos para volver a la posición inicial'
                ],
                'video' => 'https://www.youtube.com/watch?v=eozdVDA78K0'
            ],
            5 => [
                'nombre' => 'Fondos en Paralelas',
                'imagen' => 'img/fond.jpg',
                'descripcion' => 'Los fondos en paralelas son excelentes para trabajar la parte baja del pecho y los tríceps, además de mejorar la fuerza funcional.',
                'pasos' => [
                    'Acuéstate en el banco con los pies planos en el suelo',
                    'Agarra la barra con los brazos extendidos',
                    'Baja la barra controladamente hasta tocar el pecho',
                    'Empuja la barra hacia arriba hasta extender completamente los brazos'
                ],
                'video' => 'https://www.youtube.com/watch?v=2z8JmcrW-As'
            ],
            6 => [
                'nombre' => 'Press con Mancuernas',
                'imagen' => 'img/pressmancuernas.jpg',
                'descripcion' => 'El press con mancuernas permite un mayor rango de movimiento y activa los músculos estabilizadores del pecho.',
                'pasos' => [
                    'Acuéstate en el banco con los pies planos en el suelo',
                    'Agarra las mancuernas con los brazos extendidos',
                    'Baja las mancuernas controladamente hasta tocar el pecho',
                    'Empuja las mancuernas hacia arriba hasta extender completamente los brazos'
                ],
                'video' => 'https://www.youtube.com/watch?v=VmB1G1K7v94'
            ],
            7 => [
                'nombre' => 'Pullover',
                'imagen' => 'img/pull.jpg',
                'descripcion' => 'El pullover es ideal para expandir la caja torácica y trabajar tanto el pectoral como el dorsal ancho.',
                'pasos' => [
                    'Acuéstate en el banco con los pies planos en el suelo',
                    'Agarra la barra con los brazos extendidos',
                    'Baja la barra controladamente hasta tocar el pecho',
                    'Empuja la barra hacia arriba hasta extender completamente los brazos'
                ],
                'video' => 'https://www.youtube.com/watch?v=2z8JmcrW-As'
            ],
            8 => [
                'nombre' => 'Cruce de Poleas',
                'imagen' => 'img/curecepoleas.jpg',
                'descripcion' => 'El cruce de poleas es un ejercicio de aislamiento que define y marca el pectoral, especialmente en la parte interna.',
                'pasos' => [
                    'Acuéstate en el banco con los pies planos en el suelo',
                    'Agarra la barra con los brazos extendidos',
                    'Baja la barra controladamente hasta tocar el pecho',
                    'Empuja la barra hacia arriba hasta extender completamente los brazos'
                ],
                'video' => 'https://www.youtube.com/watch?v=taI4XduLpTk'
            ],
            9 => [
                'nombre' => 'Press Hammer',
                'imagen' => 'img/presshammer.jpg',
                'descripcion' => 'El press hammer se realiza en máquina y permite un movimiento guiado, ideal para principiantes y para trabajar el pecho de forma segura.',
                'pasos' => [
                    'Acuéstate en el banco con los pies planos en el suelo',
                    'Agarra la barra con los brazos extendidos',
                    'Baja la barra controladamente hasta tocar el pecho',
                    'Empuja la barra hacia arriba hasta extender completamente los brazos'
                ],
                'video' => 'https://www.youtube.com/watch?v=6JtP6ju0IMw'
            ],
            10 => [
                'nombre' => 'Push-Ups',
                'imagen' => 'img/push.jpg',
                'descripcion' => 'Las push-ups o flexiones son un ejercicio básico de peso corporal que fortalece el pecho, tríceps y core.',
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
                'descripcion' => 'Las dominadas son el ejercicio rey para la espalda, desarrollando dorsales, bíceps y fuerza funcional.',
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
                'descripcion' => 'El remo con barra es ideal para ganar masa en la espalda media y mejorar la postura.',
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
                'descripcion' => 'El jalón al pecho aísla los dorsales y es perfecto para principiantes que buscan fuerza y amplitud.',
                'pasos' => [
                    'Acuéstate en el suelo o en un banco',
                    'Agarra la barra con los brazos extendidos',
                    'Baja la barra controladamente hasta tocar el pecho',
                    'Empuja la barra hacia arriba hasta extender completamente los brazos'
                ],
                'video' => 'https://www.youtube.com/watch?v=CAwf7n6Luuc'
            ],
            14 => [
                'nombre' => 'Remo con Mancuerna',
                'imagen' => 'img/remomancuerna.jpg',
                'descripcion' => 'El remo con mancuerna permite trabajar cada lado de la espalda de forma unilateral y corregir desbalances.',
                'pasos' => [
                    'Acuéstate en el suelo o en un banco',
                    'Agarra la mancuerna con los brazos extendidos',
                    'Baja la mancuerna controladamente hasta tocar el pecho',
                    'Empuja la mancuerna hacia arriba hasta extender completamente los brazos'
                ],
                'video' => 'https://www.youtube.com/watch?v=pYcpY20QaE8'
            ],
            15 => [
                'nombre' => 'Pull-ups',
                'imagen' => 'img/ups.jpg',
                'descripcion' => 'Los pull-ups son una variante avanzada de dominadas, ideales para dorsales y fuerza de agarre.',
                'pasos' => [
                    'Agarra la barra con las manos hacia adelante',
                    'Cuelga completamente con los brazos extendidos',
                    'Tira de tu cuerpo hacia arriba hasta que tu barbilla supere la barra',
                    'Baja controladamente hasta la posición inicial'
                ],
                'video' => 'https://www.youtube.com/watch?v=HRV5YKKaeVw'
            ],
            16 => [
                'nombre' => 'Remo en Máquina',
                'imagen' => 'img/remomaquina.jpg',
                'descripcion' => 'El remo en máquina es seguro y efectivo para trabajar la espalda sin sobrecargar la zona lumbar.',
                'pasos' => [
                    'Acuéstate en la máquina de remo',
                    'Agarra la barra con las manos',
                    'Tira de la barra hacia tu abdomen bajo',
                    'Baja controladamente manteniendo la tensión'
                ],
                'video' => 'https://www.youtube.com/watch?v=roCP6wCXPqo'
            ],
            17 => [
                'nombre' => 'Hiperextensiones',
                'imagen' => 'img/hiper.jpg',
                'descripcion' => 'Las hiperextensiones fortalecen la zona lumbar y previenen lesiones en la espalda baja.',
                'pasos' => [
                    'Acuéstate en la máquina de hiperextensiones',
                    'Agarra la barra con las manos',
                    'Tira de la barra hacia arriba hasta extender completamente los brazos',
                    'Baja controladamente manteniendo la tensión'
                ],
                'video' => 'https://www.youtube.com/watch?v=ph3pddpKzzw'
            ],
            18 => [
                'nombre' => 'Face Pull',
                'imagen' => 'img/face.jpg',
                'descripcion' => 'El face pull es excelente para la parte posterior de los hombros y la salud del manguito rotador.',
                'pasos' => [
                    'Acuéstate en el suelo o en un banco',
                    'Agarra la barra con las manos',
                    'Tira de la barra hacia arriba hasta extender completamente los brazos',
                    'Baja controladamente manteniendo la tensión'
                ],
                'video' => 'https://www.youtube.com/watch?v=rep-qVOkqgk'
            ],
            19 => [
                'nombre' => 'Remo Meadows',
                'imagen' => 'img/remos.jpg',
                'descripcion' => 'El remo Meadows es una variante unilateral que enfatiza la espalda alta y el core.',
                'pasos' => [
                    'Acuéstate en el suelo o en un banco',
                    'Agarra la barra con las manos',
                    'Tira de la barra hacia arriba hasta extender completamente los brazos',
                    'Baja controladamente manteniendo la tensión'
                ],
                'video' => 'https://www.youtube.com/watch?v=6TSP1TRMUzs'
            ],
            20 => [
                'nombre' => 'Good Morning',
                'imagen' => 'img/Good.jpg',
                'descripcion' => 'El good morning es un ejercicio avanzado para la cadena posterior, especialmente la zona lumbar y glúteos.',
                'pasos' => [
                    'Acuéstate en el suelo o en un banco',
                    'Agarra la barra con las manos',
                    'Tira de la barra hacia arriba hasta extender completamente los brazos',
                    'Baja controladamente manteniendo la tensión'
                ],
                'video' => 'https://www.youtube.com/watch?v=vxqZVTH5bNo'
            ],
        ],
        'piernas' => [
            21 => [
                'nombre' => 'Sentadilla',
                'imagen' => 'img/sentadillaa.jpg',
                'descripcion' => 'La sentadilla es el ejercicio más completo para piernas, glúteos y core.',
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
                'descripcion' => 'El peso muerto trabaja toda la cadena posterior y es clave para fuerza y masa muscular.',
                'pasos' => [
                    'Colócate frente a la barra con los pies a la altura de las caderas',
                    'Flexiona las caderas y rodillas manteniendo la espalda recta',
                    'Agarra la barra con un agarre mixto o doble pronación',
                    'Levanta la barra manteniendo la espalda recta y los brazos extendidos'
                ],
                'video' => 'https://www.youtube.com/watch?v=ytGaGIn3SjE'
            ],
            23 => [
                'nombre' => 'Hip Thrust',
                'imagen' => 'img/hip.jpg',
                'descripcion' => 'El hip thrust es el mejor ejercicio para glúteos, mejorando fuerza y estética.',
                'pasos' => [
                    'Siéntate con la espalda apoyada en un banco',
                    'Coloca la barra sobre las caderas con protección',
                    'Empuja con los talones y eleva las caderas',
                    'Baja controladamente manteniendo la tensión'
                ],
                'video' => 'https://www.youtube.com/watch?v=LM8XHLYJoYs'
            ],
            24 => [
                'nombre' => 'Prensa de Piernas',
                'imagen' => 'img/premsa.jpg',
                'descripcion' => 'La prensa de piernas permite trabajar cuádriceps y glúteos con seguridad y control.',
                'pasos' => [
                    'Acuéstate en la prensa de piernas',
                    'Coloca las piernas en la plataforma',
                    'Ajusta la posición de las piernas y las caderas',
                    'Aplica la carga y realiza la contracción'
                ],
                'video' => 'https://www.youtube.com/watch?v=IZxyjW7MPJQ'
            ],
            25 => [
                'nombre' => 'Extensiones de Cuádriceps',
                'imagen' => 'img/cuadriceps.jpg',
                'descripcion' => 'Las extensiones de cuádriceps aíslan el músculo y ayudan a definir la parte frontal del muslo.',
                'pasos' => [
                    'Acuéstate en la máquina de extensiones de cuádriceps',
                    'Coloca las piernas en la plataforma',
                    'Ajusta la posición de las piernas y las caderas',
                    'Aplica la carga y realiza la contracción'
                ],
                'video' => 'https://www.youtube.com/watch?v=8B1ihfcLib4'
            ],
            26 => [
                'nombre' => 'Curl de Isquiotibiales',
                'imagen' => 'img/isquios.jpeg',
                'descripcion' => 'El curl de isquiotibiales fortalece la parte posterior del muslo y previene lesiones.',
                'pasos' => [
                    'Acuéstate en la máquina de curls de isquiotibiales',
                    'Coloca las piernas en la plataforma',
                    'Ajusta la posición de las piernas y las caderas',
                    'Aplica la carga y realiza la contracción'
                ],
                'video' => 'https://www.youtube.com/watch?v=1Tq3QdYUuHs'
            ],
            27 => [
                'nombre' => 'Elevación de Gemelos',
                'imagen' => 'img/gemelos.jpg',
                'descripcion' => 'La elevación de gemelos desarrolla las pantorrillas y mejora la estabilidad al caminar o correr.',
                'pasos' => [
                    'Acuéstate en la máquina de elevación de gemelos',
                    'Coloca las piernas en la plataforma',
                    'Ajusta la posición de las piernas y las caderas',
                    'Aplica la carga y realiza la contracción'
                ],
                'video' => 'https://www.youtube.com/watch?v=-M4-G8p8fmc'
            ],
            28 => [
                'nombre' => 'Zancadas',
                'imagen' => 'img/zancadas.jpg',
                'descripcion' => 'Las zancadas trabajan piernas y glúteos, además de mejorar el equilibrio y la coordinación.',
                'pasos' => [
                    'Coloca las piernas frente a una silla o escalón',
                    'Coloca los pies en la silla o escalón',
                    'Baja hasta que las piernas estén paralelas al suelo',
                    'Empuja hacia arriba hasta extender completamente las piernas'
                ],
                'video' => 'https://www.youtube.com/watch?v=QOVaHwm-Q6U'
            ],
            29 => [
                'nombre' => 'Sentadilla Búlgara',
                'imagen' => 'img/bulgara.jpg',
                'descripcion' => 'La sentadilla búlgara es ideal para fuerza unilateral y desarrollo de glúteos y cuádriceps.',
                'pasos' => [
                    'Coloca las piernas frente a una silla o escalón',
                    'Coloca los pies en la silla o escalón',
                    'Baja hasta que las piernas estén paralelas al suelo',
                    'Empuja hacia arriba hasta extender completamente las piernas'
                ],
                'video' => 'https://www.youtube.com/watch?v=2C-uNgKwPLE'
            ],
            30 => [
                'nombre' => 'Aductores',
                'imagen' => 'img/aductores.jpg',
                'descripcion' => 'El trabajo de aductores fortalece la cara interna del muslo y previene lesiones en la cadera.',
                'pasos' => [
                    'Coloca las piernas frente a una silla o escalón',
                    'Coloca los pies en la silla o escalón',
                    'Baja hasta que las piernas estén paralelas al suelo',
                    'Empuja hacia arriba hasta extender completamente las piernas'
                ],
                'video' => 'https://www.youtube.com/watch?v=QmZAiY2k6z8'
            ],
        ],
        'brazos' => [
            31 => [
                'nombre' => 'Curl de Bíceps',
                'imagen' => 'img/biceps.jpg',
                'descripcion' => 'El curl de bíceps es el movimiento básico para aumentar el tamaño y la fuerza del bíceps.',
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
                'descripcion' => 'La extensión de tríceps aísla la parte posterior del brazo y mejora la definición.',
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
                'descripcion' => 'El curl martillo trabaja el braquiorradial y da grosor al antebrazo.',
                'pasos' => [
                    'De pie, sostén la mancuerna con la mano',
                    'Mantén el brazo extendido',
                    'Flexiona el brazo llevando el peso hacia los hombros',
                    'Baja controladamente a la posición inicial'
                ],
                'video' => 'https://www.youtube.com/watch?v=zC3nLlEvin4'
            ],
            34 => [
                'nombre' => 'Press Francés',
                'imagen' => 'img/frances.jpg',
                'descripcion' => 'El press francés es ideal para el desarrollo del tríceps largo.',
                'pasos' => [
                    'Acuéstate en el banco con los pies planos en el suelo',
                    'Agarra la barra con las manos',
                    'Baja la barra controladamente hasta tocar el pecho',
                    'Empuja la barra hacia arriba hasta extender completamente los brazos'
                ],
                'video' => 'https://www.youtube.com/watch?v=0AUGkch3tzc'
            ],
            35 => [
                'nombre' => 'Curl con Barra Z',
                'imagen' => 'img/z.jpg',
                'descripcion' => 'El curl con barra Z reduce la tensión en las muñecas y permite un trabajo efectivo del bíceps.',
                'pasos' => [
                    'Acuéstate en el banco con los pies planos en el suelo',
                    'Agarra la barra con las manos',
                    'Baja la barra controladamente hasta tocar el pecho',
                    'Empuja la barra hacia arriba hasta extender completamente los brazos'
                ],
                'video' => 'https://www.youtube.com/watch?v=kwG2ipFRgfo'
            ],
            36 => [
                'nombre' => 'Extensiones en Polea',
                'imagen' => 'img/extension.jpg',
                'descripcion' => 'Las extensiones en polea son perfectas para aislar el tríceps y mejorar la definición.',
                'pasos' => [
                    'Acuéstate en la máquina de extensiones en polea',
                    'Coloca las manos en la barra',
                    'Ajusta la posición de las manos',
                    'Aplica la carga y realiza la contracción'
                ],
                'video' => 'https://www.youtube.com/watch?v=2-LAMcpzODU'
            ],
            37 => [
                'nombre' => 'Curl Scott',
                'imagen' => 'img/curl.jpg',
                'descripcion' => 'El curl Scott aísla el bíceps y minimiza la intervención de otros músculos.',
                'pasos' => [
                    'Acuéstate en el banco con los pies planos en el suelo',
                    'Agarra la barra con las manos',
                    'Baja la barra controladamente hasta tocar el pecho',
                    'Empuja la barra hacia arriba hasta extender completamente los brazos'
                ],
                'video' => 'https://www.youtube.com/watch?v=soxrZlIl35U'
            ],
            38 => [
                'nombre' => 'Fondos en Banco',
                'imagen' => 'img/fondos.jpg',
                'descripcion' => 'Los fondos en banco son ideales para trabajar tríceps y pectoral inferior con el propio peso corporal.',
                'pasos' => [
                    'Acuéstate en el banco con los pies planos en el suelo',
                    'Agarra la barra con las manos',
                    'Baja la barra controladamente hasta tocar el pecho',
                    'Empuja la barra hacia arriba hasta extender completamente los brazos'
                ],
                'video' => 'https://www.youtube.com/watch?v=6kALZikXxLc'
            ],
            39 => [
                'nombre' => 'Curl de Concentración',
                'imagen' => 'img/katana.jpg',
                'descripcion' => 'El curl de concentración permite máxima contracción y enfoque en el bíceps.',
                'pasos' => [
                    'Acuéstate en el banco con los pies planos en el suelo',
                    'Agarra la barra con las manos',
                    'Baja la barra controladamente hasta tocar el pecho',
                    'Empuja la barra hacia arriba hasta extender completamente los brazos'
                ],
                'video' => 'https://www.youtube.com/watch?v=soxrZlIl35U'
            ],
            40 => [
                'nombre' => 'Extensiones sobre la Cabeza',
                'imagen' => 'img/extens.jpg',
                'descripcion' => 'Las extensiones sobre la cabeza trabajan el tríceps largo y mejoran la fuerza general del brazo.',
                'pasos' => [
                    'Acuéstate en el banco con los pies planos en el suelo',
                    'Agarra la barra con las manos',
                    'Baja la barra controladamente hasta tocar el pecho',
                    'Empuja la barra hacia arriba hasta extender completamente los brazos'
                ],
                'video' => 'https://www.youtube.com/watch?v=2-LAMcpzODU'
            ],
        ],
        'core' => [
            41 => [
                'nombre' => 'Plancha',
                'imagen' => 'img/plancha.jpg',
                'descripcion' => 'La plancha fortalece el core, mejora la postura y previene lesiones.',
                'pasos' => [
                    'Apóyate sobre los antebrazos y las puntas de los pies',
                    'Mantén el cuerpo en línea recta desde la cabeza hasta los talones',
                    'Contrae el core y los glúteos',
                    'Mantén la posición durante el tiempo establecido'
                ],
                'video' => 'https://www.youtube.com/watch?v=pSHjTRCQxIw'
            ],
            42 => [
                'nombre' => 'Crunch',
                'imagen' => 'img/crunch.jpg',
                'descripcion' => 'El crunch es el ejercicio clásico para trabajar la parte superior del abdomen.',
                'pasos' => [
                    'Acuéstate en el suelo o en un banco',
                    'Agarra las manos detrás de la cabeza',
                    'Levanta las piernas y flexiona las rodillas',
                    'Contrae el core y los glúteos'
                ],
                'video' => 'https://www.youtube.com/watch?v=Xyd_fa5zoEU'
            ],
            43 => [
                'nombre' => 'Russian Twist',
                'imagen' => 'img/russian.jpg',
                'descripcion' => 'El Russian twist trabaja los oblicuos y mejora la estabilidad del core.',
                'pasos' => [
                    'Acuéstate en el suelo o en un banco',
                    'Agarra las manos detrás de la cabeza',
                    'Levanta las piernas y flexiona las rodillas',
                    'Contrae el core y los glúteos'
                ],
                'video' => 'https://www.youtube.com/watch?v=wkD8rjkodUI'
            ],
            44 => [
                'nombre' => 'Elevación de Piernas',
                'imagen' => 'img/elevacion.jpg',
                'descripcion' => 'La elevación de piernas es excelente para la parte baja del abdomen.',
                'pasos' => [
                    'Acuéstate en el suelo o en un banco',
                    'Agarra las manos detrás de la cabeza',
                    'Levanta las piernas y flexiona las rodillas',
                    'Contrae el core y los glúteos'
                ],
                'video' => 'https://www.youtube.com/watch?v=JB2oyawG9KI'
            ],
            45 => [
                'nombre' => 'Plancha Lateral',
                'imagen' => 'img/lateral.jpg',
                'descripcion' => 'La plancha lateral fortalece los oblicuos y mejora la estabilidad lateral.',
                'pasos' => [
                    'Acuéstate en el suelo o en un banco',
                    'Agarra las manos detrás de la cabeza',
                    'Levanta las piernas y flexiona las rodillas',
                    'Contrae el core y los glúteos'
                ],
                'video' => 'https://www.youtube.com/watch?v=K2VljzCC16g'
            ],
            46 => [
                'nombre' => 'Dragon Flag',
                'imagen' => 'img/dragon.jpg',
                'descripcion' => 'El dragon flag es un ejercicio avanzado que trabaja todo el core y la fuerza funcional.',
                'pasos' => [
                    'Acuéstate en el suelo o en un banco',
                    'Agarra las manos detrás de la cabeza',
                    'Levanta las piernas y flexiona las rodillas',
                    'Contrae el core y los glúteos'
                ],
                'video' => 'https://www.youtube.com/watch?v=U0y0PqjdQoo'
            ],
            47 => [
                'nombre' => 'Ab Wheel',
                'imagen' => 'img/wheel.jpg',
                'descripcion' => 'El ab wheel es ideal para un core fuerte y resistente.',
                'pasos' => [
                    'Acuéstate en el suelo o en un banco',
                    'Agarra las manos detrás de la cabeza',
                    'Levanta las piernas y flexiona las rodillas',
                    'Contrae el core y los glúteos'
                ],
                'video' => 'https://www.youtube.com/watch?v=J2Q8WPTrD-M'
            ],
            48 => [
                'nombre' => 'Pallof Press',
                'imagen' => 'img/pallof.jpg',
                'descripcion' => 'El pallof press es un ejercicio anti-rotacional que mejora la estabilidad del core.',
                'pasos' => [
                    'Acuéstate en el suelo o en un banco',
                    'Agarra las manos detrás de la cabeza',
                    'Levanta las piernas y flexiona las rodillas',
                    'Contrae el core y los glúteos'
                ],
                'video' => 'https://www.youtube.com/watch?v=F2t4XN7wq6A'
            ],
            49 => [
                'nombre' => 'Hollow Hold',
                'imagen' => 'img/hollow.jpg',
                'descripcion' => 'El hollow hold es un isométrico que fortalece el abdomen profundo.',
                'pasos' => [
                    'Acuéstate en el suelo o en un banco',
                    'Agarra las manos detrás de la cabeza',
                    'Levanta las piernas y flexiona las rodillas',
                    'Contrae el core y los glúteos'
                ],
                'video' => 'https://www.youtube.com/watch?v=Cb8JY3G_WCM'
            ],
            50 => [
                'nombre' => 'Wood Chops',
                'imagen' => 'img/wood.jpg',
                'descripcion' => 'El wood chop es excelente para trabajar la rotación y la fuerza funcional del core.',
                'pasos' => [
                    'Acuéstate en el suelo o en un banco',
                    'Agarra las manos detrás de la cabeza',
                    'Levanta las piernas y flexiona las rodillas',
                    'Contrae el core y los glúteos'
                ],
                'video' => 'https://www.youtube.com/watch?v=Qp6WmQHDQH0'
            ],
        ],
    ];

    public function index() {
        $ejerciciosPorGrupo = $this->ejercicios;
        require_once __DIR__ . '/../views/auth/consultaEjercicios.php';
    }

    public function verEjercicio($id) {
        // Buscar el ejercicio en todos los grupos musculares
        foreach ($this->ejercicios as $grupo => $ejercicios) {
            if (isset($ejercicios[$id])) {
                header('Content-Type: application/json');
                echo json_encode($ejercicios[$id]);
                return;
            }
        }
        
        // Si no se encuentra el ejercicio, devolver un error
        header('HTTP/1.1 404 Not Found');
        echo json_encode(['error' => 'Ejercicio no encontrado']);
    }
}

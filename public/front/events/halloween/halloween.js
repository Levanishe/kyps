// public/front/events/halloween/halloween.js

// Проверяем, существует ли глобальная переменная с флагом включения Хэллоуина
// Если event_halloween_enabled не определен или false, то не запускаем
if (typeof window.event_halloween_enabled !== 'undefined' && window.event_halloween_enabled) {
    document.addEventListener('DOMContentLoaded', () => {
        const body = document.body;
        const numberOfPumpkins = 25; // Увеличил количество тыкв
        const fallDurationMin = 6; // Минимальное время падения тыквы в секундах (немного увеличил)
        const fallDurationMax = 12; // Максимальное время падения тыквы в секундах (немного увеличил)
        const spawnInterval = 400; // Интервал между появлением новых тыкв в миллисекундах (уменьшил для большей частоты)
        const rotationRange = 360; // Диапазон случайного поворота в градусах (от 0 до 360)
        const initialPumpkins = 5; // Количество тыкв, которые появляются сразу

        let pumpkinsCreated = 0;

        let halloweenStyleSheet = document.getElementById('halloween-animations-style');

        if (!halloweenStyleSheet) {
            halloweenStyleSheet = document.createElement('style');
            halloweenStyleSheet.id = 'halloween-animations-style';
            document.head.appendChild(halloweenStyleSheet);
        }

        const styleSheetForAnimations = halloweenStyleSheet.sheet;

        function createPumpkin() {
            if (pumpkinsCreated >= numberOfPumpkins) {
                return;
            }

            const pumpkin = document.createElement('div');
            pumpkin.classList.add('pumpkin');
            pumpkin.classList.add('orange');

            const startPosition = Math.random() * (window.innerWidth - 60);
            pumpkin.style.left = `${startPosition}px`;

            const initialRotation = Math.random() * rotationRange;
            pumpkin.style.setProperty('--random-rotation', `${initialRotation}deg`);

            const fallDuration = Math.random() * (fallDurationMax - fallDurationMin) + fallDurationMin;

            const keyframesName = `fall-${Date.now()}-${Math.random().toString(36).substring(7)}`;

            try {
                const keyframesRule = `@keyframes ${keyframesName} {
                    0% { transform: translateY(0) rotate(${initialRotation}deg); opacity: 1; }
                    100% { transform: translateY(${window.innerHeight + 100}px) rotate(${initialRotation + (Math.random() > 0.5 ? 360 : -360)}deg); opacity: 0; }
                }`;
                styleSheetForAnimations.insertRule(keyframesRule, styleSheetForAnimations.cssRules.length);
            } catch (e) {
                console.error("Failed to insert keyframe rule into custom stylesheet:", e);
            }

            pumpkin.style.animationName = keyframesName;
            pumpkin.style.animationDuration = `${fallDuration}s`;
            pumpkin.style.animationTimingFunction = 'linear';
            pumpkin.style.animationFillMode = 'forwards';

            body.appendChild(pumpkin);
            pumpkinsCreated++;

            pumpkin.addEventListener('animationend', () => {
                pumpkin.remove();
            });
        }

        const pumpkinInterval = setInterval(() => {
            createPumpkin();
            if (pumpkinsCreated >= numberOfPumpkins) {
                clearInterval(pumpkinInterval);
            }
        }, spawnInterval);

        for (let i = 0; i < initialPumpkins; i++) {
            createPumpkin();
        }
    });
}
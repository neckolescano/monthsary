<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Happy 1st Monthsary, belle</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@500;600;700&family=Libre+Baskerville:wght@400;700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        body {
            font-family: 'Libre Baskerville', serif;
            background:
                radial-gradient(circle at top, rgba(245, 221, 232, 0.86), transparent 16%),
                radial-gradient(circle at 20% 80%, rgba(228, 196, 168, 0.18), transparent 12%),
                radial-gradient(circle at 80% 20%, rgba(207, 185, 158, 0.18), transparent 14%),
                linear-gradient(135deg, #fffaf5 0%, #f9f2e7 48%, #f4e9db 100%);
        }

        .glass-card {
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.7), rgba(255, 255, 255, 0.22));
            backdrop-filter: blur(18px);
            -webkit-backdrop-filter: blur(18px);
            box-shadow:
                inset 0 1px 0 rgba(255, 255, 255, 0.52),
                0 28px 50px rgba(225, 182, 247, 0.12);
        }

        .glow-ring {
            box-shadow:
                inset 0 0 18px rgba(255, 255, 255, 0.2),
                0 0 0 1px rgba(255, 255, 255, 0.18),
                0 0 20px rgba(244, 114, 182, 0.08);
        }

        .heart-float {
            position: absolute;
            color: rgba(236, 72, 153, 0.75);
            font-size: 1rem;
            animation: drift 9s linear infinite;
            opacity: 0.7;
            text-shadow: 0 0 10px rgba(244, 114, 182, 0.18);
        }

        .envelope-wrap {
            position: fixed;
            inset: 0;
            z-index: 50;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(255, 247, 236, 0.52);
            backdrop-filter: blur(10px);
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.5s ease;
        }

        .envelope-wrap.show {
            opacity: 1;
            pointer-events: auto;
        }

        .envelope {
            position: relative;
            width: min(92vw, 430px);
            height: 300px;
            margin: 0 auto;
            cursor: pointer;
            transform-style: preserve-3d;
            transition: transform 0.9s ease;
        }

        .envelope.open {
            transform: rotateX(6deg) translateY(10px);
        }

        .envelope-front,
        .envelope-back,
        .letter {
            position: absolute;
            inset: 0;
            border-radius: 18px;
        }

        .envelope-front {
            background: linear-gradient(180deg, #f7e1cc 0%, #e8b993 100%);
            border: 1px solid rgba(255, 255, 255, 0.48);
            overflow: hidden;
            z-index: 2;
            clip-path: polygon(0 0, 100% 0, 50% 50%, 0 0);
            transform-origin: top;
            transition: transform 0.9s ease, opacity 0.6s ease;
        }

        .envelope.open .envelope-front {
            transform: rotateX(180deg);
            opacity: 0;
        }

        .envelope-back {
            background: linear-gradient(180deg, #f6dfc3 0%, #e9c49f 100%);
            border: 1px solid rgba(255, 255, 255, 0.38);
            overflow: hidden;
            z-index: 1;
        }

        .envelope-back::before,
        .envelope-back::after {
            content: '';
            position: absolute;
            width: 0;
            height: 0;
            border-left: 215px solid transparent;
            border-right: 215px solid transparent;
        }

        .envelope-back::before {
            top: 0;
            border-top: 140px solid rgba(255, 255, 255, 0.18);
        }

        .envelope-back::after {
            bottom: 0;
            border-bottom: 140px solid rgba(255, 255, 255, 0.1);
        }

        .letter {
            top: 12px;
            left: 12px;
            right: 12px;
            bottom: 12px;
            background: linear-gradient(180deg, rgba(255, 255, 255, 0.88), rgba(255, 247, 236, 0.72));
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.5);
            z-index: 0;
            transform-origin: top;
            transition: transform 0.9s ease, opacity 0.6s ease;
            opacity: 0;
            overflow: hidden;
        }

        .envelope.open .letter {
            transform: translateY(18px) rotateX(0deg);
            opacity: 1;
            z-index: 3;
        }

        .letter::before {
            content: '';
            position: absolute;
            inset: 0;
            background:
                radial-gradient(circle at top, rgba(244, 199, 166, 0.22), transparent 18%),
                linear-gradient(180deg, rgba(255, 255, 255, 0.12), rgba(255, 255, 255, 0));
        }

        @keyframes drift {
            0% {
                transform: translateY(0) translateX(0) scale(0.78) rotate(0deg);
                opacity: 0;
            }
            12% {
                opacity: 0.65;
            }
            50% {
                transform: translateY(-138px) translateX(18px) scale(1.08) rotate(12deg);
            }
            78% {
                opacity: 0.42;
            }
            100% {
                transform: translateY(-250px) translateX(-12px) scale(0.9) rotate(-14deg);
                opacity: 0;
            }
        }

        @keyframes bloom {
            0% {
                transform: scale(0.4) translateY(30px);
                opacity: 0;
            }
            60% {
                transform: scale(1.04) translateY(-8px);
                opacity: 1;
            }
            100% {
                transform: scale(1) translateY(0);
                opacity: 1;
            }
        }

        @keyframes floatHeart {
            0% {
                transform: translateY(0) scale(0.8) rotate(0deg);
                opacity: 0;
            }
            15% {
                opacity: 0.75;
            }
            100% {
                transform: translateY(-170px) scale(1.2) rotate(18deg);
                opacity: 0;
            }
        }

        @keyframes pulseGlow {
            0%, 100% {
                transform: scale(1);
                opacity: 0.5;
            }
            50% {
                transform: scale(1.08);
                opacity: 0.82;
            }
        }

        @keyframes cameraFlash {
            0% {
                opacity: 0;
            }
            20% {
                opacity: 0.9;
            }
            40% {
                opacity: 0.35;
            }
            100% {
                opacity: 0;
            }
        }

        @keyframes stripPrint {
            0% {
                transform: translateY(30px) scale(0.94) rotate(-1deg);
                opacity: 0;
            }
            40% {
                transform: translateY(10px) scale(1) rotate(0.5deg);
                opacity: 0.9;
            }
            70% {
                transform: translateY(-4px) scale(1.01) rotate(-0.3deg);
                opacity: 1;
            }
            100% {
                transform: translateY(0) scale(1) rotate(0deg);
                opacity: 1;
            }
        }
    </style>
</head>
<body class="relative min-h-screen overflow-x-hidden">
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute left-1/4 top-16 h-52 w-52 rounded-full bg-pink-200/30 blur-3xl"></div>
        <div class="absolute right-1/4 bottom-10 h-64 w-64 rounded-full bg-violet-200/35 blur-3xl"></div>
        <div class="absolute left-1/2 top-1/2 h-72 w-72 -translate-x-1/2 -translate-y-1/2 rounded-full bg-white/10 blur-3xl"></div>
    </div>

    <div class="relative min-h-screen"
        x-data="loveReasons()"
        x-init="init()"
        @scroll.window.debounce.150ms="if (!introSeen && window.scrollY > 80) startReveal()">
        <main class="relative flex min-h-screen items-center justify-center px-4 py-10 sm:px-6 lg:px-8">
            <section class="glass-card w-full max-w-3xl rounded-[36px] border border-[#f3e3d0] p-8 sm:p-10"
                x-show="!introSeen"
                x-transition.opacity.duration.500
                @click.self="startReveal()">
                <div class="text-center">
                    <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-full bg-gradient-to-br from-[#f8e7d8] to-[#f3d7c3] text-xl text-[#b36b6b] shadow-inner shadow-[#f7d7be]/50">
                        ♥
                    </div>
                    <h1 class="mt-4 font-['Cormorant_Garamond'] text-4xl sm:text-5xl lg:text-6xl text-[#5a4338] leading-tight">
                        Happy 1st Monthsary, <span class="text-[#b36b6b]">belle</span>
                    </h1>
                    <p class="mt-4 text-base sm:text-lg leading-7 text-[#7b6458]">
                        Pindota ang button for the surprise baby mwahh
                    </p>
                    <button
                        type="button"
                        @click.stop="startReveal()"
                        class="mt-6 inline-flex items-center rounded-full bg-gradient-to-r from-[#c98e79] to-[#d9b18e] px-5 py-3 text-sm font-semibold text-white shadow-lg shadow-[#e7c9ab]/50"
                    >
                        Open the surprise
                    </button>
                </div>
            </section>
        </main>

        <div class="envelope-wrap" :class="{ 'show': introSeen }" x-show="introSeen">
            <div class="envelope" :class="{ 'open': opened }" @click="toggleEnvelope()">
                <div class="envelope-front"></div>
                <div class="envelope-back"></div>
                <div class="letter">
                    <div class="relative h-full p-5 sm:p-6">
                        <div class="absolute inset-0 bg-[radial-gradient(circle_at_top,rgba(255,255,255,0.5),transparent_15%)]"></div>
                        <div class="relative z-10 flex h-full flex-col justify-center text-center">
                            <p class="text-xs uppercase tracking-[0.35em] text-[#b36b6b]">For my belle</p>
                            <div class="mt-3 space-y-3">
                                <p
                                    x-show="showReason"
                                    x-transition:enter="transition ease-out duration-500"
                                    x-transition:enter-start="opacity-0 translate-y-2"
                                    x-transition:enter-end="opacity-100 translate-y-0"
                                    class="text-sm leading-6 text-slate-700 sm:text-base"
                                    x-text="currentReason"
                                ></p>
                            </div>
                            <button
                                type="button"
                                @click.stop="pickReason()"
                                class="mx-auto mt-4 inline-flex items-center rounded-full bg-gradient-to-r from-[#c98e79] to-[#d9b18e] px-4 py-2 text-xs font-semibold text-white shadow-md shadow-[#e7c9ab]/50"
                            >
                                Next reason
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div
            x-show="showPhotoGallery"
            x-transition:enter="transition ease-out duration-700"
            x-transition:enter-start="opacity-0 scale-90"
            x-transition:enter-end="opacity-100 scale-100"
            class="fixed inset-0 z-[60] flex items-center justify-center bg-white/15 backdrop-blur-sm"
        >
            <div class="relative mx-4 flex h-[560px] w-full max-w-3xl items-center justify-center overflow-hidden rounded-[36px] border border-white/30 bg-gradient-to-br from-[#fffafc] via-[#fff] to-[#f7f1ff] p-6 shadow-[0_25px_70px_rgba(244,114,182,0.16)]">
                <div class="absolute inset-0 bg-[radial-gradient(circle_at_top,rgba(255,230,245,0.9),transparent_18%),radial-gradient(circle_at_bottom,rgba(233,213,255,0.65),transparent_18%)]"></div>
                <div class="absolute left-8 top-8 h-16 w-16 rounded-full bg-pink-100/40 blur-2xl"></div>
                <div class="absolute bottom-8 right-8 h-20 w-20 rounded-full bg-violet-100/40 blur-2xl"></div>
                <div class="relative z-10 flex h-full w-full flex-col items-center justify-center text-center">
                    <p class="text-[10px] uppercase tracking-[0.55em] text-[#b36b6b]">A little memory</p>
                    <div class="mt-5 flex w-full items-center justify-center">
                        <div class="relative w-full max-w-[620px] rounded-[30px] border border-[#f5d5e7] bg-[#fffafc] p-4 shadow-[inset_0_1px_0_rgba(255,255,255,0.65),0_18px_40px_rgba(244,114,182,0.08)]">
                            <div class="absolute left-3 top-3 h-1.5 w-1.5 rounded-full bg-pink-200"></div>
                            <div class="absolute right-3 top-3 h-1.5 w-1.5 rounded-full bg-pink-200"></div>
                            <div class="absolute bottom-3 left-3 h-1.5 w-1.5 rounded-full bg-pink-200"></div>
                            <div class="absolute bottom-3 right-3 h-1.5 w-1.5 rounded-full bg-pink-200"></div>
                            <div class="flex items-stretch gap-3 bg-[#fff8fb] p-3">
                                <div class="flex-1 overflow-hidden rounded-[18px] bg-white p-2 shadow-sm">
                                    <img src="{{ asset('images/p1.jpg') }}" alt="Memory 1" class="h-56 w-full rounded-[14px] object-cover">
                                </div>
                                <div class="flex-1 overflow-hidden rounded-[18px] bg-white p-2 shadow-sm">
                                    <img src="{{ asset('images/p2.jpg') }}" alt="Memory 2" class="h-56 w-full rounded-[14px] object-cover">
                                </div>
                                <div class="flex-1 overflow-hidden rounded-[18px] bg-white p-2 shadow-sm">
                                    <img src="{{ asset('images/p3.jpg') }}" alt="Memory 3" class="h-56 w-full rounded-[14px] object-cover">
                                </div>
                            </div>
                        </div>
                    </div>
                    <button
                        type="button"
                        @click="continueToFinal()"
                        class="mt-6 inline-flex items-center justify-center rounded-full bg-gradient-to-r from-[#c98e79] to-[#d9b18e] px-5 py-2.5 text-xs font-semibold text-white shadow-lg shadow-[#e7c9ab]/50"
                    >
                        Continue
                    </button>
                </div>
            </div>
        </div>

        <div
            x-show="showFinalBloom"
            x-transition:enter="transition ease-out duration-700"
            x-transition:enter-start="opacity-0 scale-90"
            x-transition:enter-end="opacity-100 scale-100"
            class="fixed inset-0 z-[70] flex items-center justify-center bg-white/15 backdrop-blur-sm"
        >
            <div class="relative mx-4 flex min-h-[560px] w-full max-w-3xl items-center justify-center overflow-hidden rounded-[36px] border border-[#f3e3d0] bg-gradient-to-br from-[#fffaf5] via-[#fff] to-[#f7ece0] shadow-[0_25px_70px_rgba(208,177,142,0.18)]">
                <div class="absolute inset-0 bg-[linear-gradient(180deg,rgba(255,250,245,0.9),rgba(255,255,255,0.75))]"></div>
                <div class="absolute left-[10%] top-12 text-pink-300/90" style="animation: floatHeart 5.2s linear infinite; font-size: 1.45rem;">♥</div>
                <div class="absolute right-[12%] top-16 text-rose-300/90" style="animation: floatHeart 4.9s linear infinite 0.7s; font-size: 1.25rem;">♥</div>
                <div class="absolute left-[28%] top-24 text-violet-300/90" style="animation: floatHeart 5.6s linear infinite 1.2s; font-size: 1rem;">♥</div>
                <div class="absolute right-[26%] top-10 text-amber-200/90" style="animation: floatHeart 5.1s linear infinite 0.4s; font-size: 0.95rem;">♥</div>
                <div class="absolute left-[50%] top-8 text-pink-200/80" style="animation: floatHeart 6.2s linear infinite 1.8s; font-size: 0.85rem;">♥</div>

                <div class="absolute inset-0 z-0" x-show="cameraFlash" x-transition.opacity.duration.300 style="animation: cameraFlash 0.45s ease-out; background: rgba(255,255,255,0.88);"></div>

                <div class="relative z-10 flex h-full w-full items-center justify-center p-3 sm:p-6">
                    <div class="relative w-full max-w-[430px]" x-show="!showPhotoStrip">
                        <div class="rounded-[32px] border border-[#e9cfb5] bg-[#fffaf5] p-3.5 sm:p-5 shadow-[inset_0_1px_0_rgba(255,255,255,0.7),0_20px_50px_rgba(208,177,142,0.12)]">
                            <div class="rounded-[26px] bg-[#f7e2cd] p-2.5 sm:p-4 shadow-inner shadow-[#f7d7be]/50">
                                <div class="rounded-[22px] bg-[#fffaf5] p-3 sm:p-4">
                                    <div class="flex items-center justify-between px-2">
                                        <span class="h-2.5 w-2.5 rounded-full bg-[#d9b18e]"></span>
                                        <span class="h-2.5 w-2.5 rounded-full bg-[#d9b18e]"></span>
                                    </div>
                                    <div class="mt-4 rounded-[18px] bg-gradient-to-br from-[#f8e2c9] via-[#fff7ec] to-[#f5d7af] p-4 sm:p-5">
                                        <div class="mx-auto flex h-44 w-full max-w-[260px] items-center justify-center rounded-[16px] border border-white/50 bg-[radial-gradient(circle_at_top,#fff,#f7ddba_60%,#e7b98f)] shadow-inner shadow-[#f7d7be]/50 sm:h-48">
                                            <div class="flex h-24 w-24 items-center justify-center rounded-full bg-[#d9b18e] shadow-[inset_0_0_18px_rgba(255,255,255,0.18),0_0_22px_rgba(208,177,142,0.1)] sm:h-28 sm:w-28">
                                                <div class="h-14 w-14 rounded-full border border-white/40 bg-gradient-to-br from-[#fff] to-[#f6e1c7] sm:h-16 sm:w-16"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-4 flex items-center justify-between px-2">
                                        <div class="h-3 w-12 rounded-full bg-[#e9cfb5]/80 sm:w-14"></div>
                                        <button
                                            type="button"
                                            @click="takePicture()"
                                            class="flex h-14 w-14 items-center justify-center rounded-full border border-[#f1dfc7] bg-white shadow-[0_8px_18px_rgba(208,177,142,0.18)] sm:h-16 sm:w-16"
                                        >
                                            <span class="h-9 w-9 rounded-full bg-gradient-to-br from-[#c98e79] to-[#d9b18e] sm:h-10 sm:w-10"></span>
                                        </button>
                                        <div class="h-3 w-9 rounded-full bg-[#e9cfb5]/80 sm:w-10"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="w-full max-w-[520px]" x-show="showPhotoStrip" x-transition:enter="transition ease-out duration-700" x-transition:enter-start="opacity-0 translate-y-5" x-transition:enter-end="opacity-100 translate-y-0">
                        <div class="relative mx-auto max-w-[360px] overflow-hidden rounded-[34px] border border-[#f4d7e7] bg-[#fffafc] p-3 shadow-[inset_0_1px_0_rgba(255,255,255,0.7),0_18px_40px_rgba(244,114,182,0.1)] sm:max-w-[420px] sm:p-4">
                            <div class="absolute inset-0 bg-[linear-gradient(180deg,rgba(255,248,252,0.96),rgba(255,255,255,0.76))]"></div>
                            <div class="absolute left-3 top-3 h-2 w-2 rounded-full bg-pink-200"></div>
                            <div class="absolute right-3 top-3 h-2 w-2 rounded-full bg-pink-200"></div>
                            <div class="absolute bottom-3 left-3 h-2 w-2 rounded-full bg-pink-200"></div>
                            <div class="absolute bottom-3 right-3 h-2 w-2 rounded-full bg-pink-200"></div>
                            <div class="relative z-10 flex justify-center bg-[#fff8fb] p-2 sm:p-3" style="animation: stripPrint 0.9s ease-out;">
                                <div class="w-full overflow-hidden rounded-[22px] bg-white p-2 shadow-[0_10px_30px_rgba(244,114,182,0.08)]">
                                    <img src="{{ asset('images/p4.png') }}" alt="Printed photo" class="w-full rounded-[16px] object-contain max-h-[420px] sm:max-h-[460px]">
                                </div>
                            </div>
                        </div>
                        <div class="mt-5 flex flex-col items-center text-center">
                            <p class="text-xs uppercase tracking-[0.45em] text-[#b36b6b]">Always</p>
                            <h2 class="mt-2 font-['Cormorant_Garamond'] text-3xl text-[#5a4338]">I love you, belle</h2>
                            <button
                                type="button"
                                @click="goBack()"
                                class="mt-5 inline-flex items-center justify-center rounded-full bg-gradient-to-r from-[#c98e79] to-[#d9b18e] px-5 py-2.5 text-xs font-semibold text-white shadow-lg shadow-[#e7c9ab]/50"
                            >
                                Go back
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function loveReasons() {
            return {
                introSeen: false,
                opened: false,
                showPhotoGallery: false,
                showFinalBloom: false,
                showPhotoStrip: false,
                cameraFlash: false,
                reasons: [
                    'You make even the quiet moments feel special.',
                    'I love how bubbly your energy is.',
                    'Ganahan ko saimong smile my favorite gummy smile ever.',
                    'Your smile has a way of making my whole day lighter.',
                    'I love how safe and happy I feel when I’m with you.',
                    'You are my favorite person to think about when I miss you.',
                    'The way you care about people is one of the most beautiful things about you.',
                    'The day nakaila tika is the most special day for me.',
                    'Everytime mag call ta kay ma feel nako nga ang presence nimo is enough to make everything better.',
                    'Ikaw and first one to make me feel someones warmth even through a call lang.',
                    'Bisag sa simple things nga bond nato basta ikaw akong kauban is so special jud.',
                    'The LDR thingy is really not hard with you because I can feel your love bisag unsa pa kalayo.',
                    'I like how cute ur eyes is pag makasala ka mag beautiful eyes na dayon ka.',
                    'I cant image jud if wala ta nag meet huhu youre the most genuine and sweetest person i ever met.',
                    'I love your heart more than I can ever put into words.'
                ],
                currentReason: '',
                showReason: false,
                seenReasons: [],
                init() {
                    this.currentReason = this.reasons[0];
                    this.showReason = false;
                },
                startReveal() {
                    if (this.introSeen) {
                        return;
                    }
                    this.introSeen = true;
                    this.opened = false;
                    this.showReason = false;
                },
                toggleEnvelope() {
                    this.opened = !this.opened;
                    if (this.opened) {
                        this.showReason = false;
                        setTimeout(() => {
                            this.currentReason = this.reasons[Math.floor(Math.random() * this.reasons.length)];
                            this.showReason = true;
                        }, 450);
                    } else {
                        this.showReason = false;
                    }
                },
                pickReason() {
                    if (this.seenReasons.length >= this.reasons.length) {
                        this.showReason = false;
                        this.showPhotoGallery = true;
                        return;
                    }

                    let next = this.reasons[Math.floor(Math.random() * this.reasons.length)];
                    while (this.seenReasons.includes(next)) {
                        next = this.reasons[Math.floor(Math.random() * this.reasons.length)];
                    }

                    this.seenReasons.push(next);
                    this.showReason = false;
                    setTimeout(() => {
                        this.currentReason = next;
                        this.showReason = true;
                    }, 180);
                },
                continueToFinal() {
                    this.showPhotoGallery = false;
                    this.showFinalBloom = true;
                    this.showPhotoStrip = false;
                    this.cameraFlash = false;
                },
                takePicture() {
                    this.cameraFlash = true;
                    setTimeout(() => {
                        this.cameraFlash = false;
                        this.showPhotoStrip = true;
                    }, 420);
                },
                goBack() {
                    this.showFinalBloom = false;
                    this.showPhotoGallery = false;
                    this.showPhotoStrip = false;
                    this.cameraFlash = false;
                    this.introSeen = false;
                    this.opened = false;
                    this.showReason = false;
                    this.currentReason = this.reasons[0];
                    this.seenReasons = [];
                }
            };
        }
    </script>
</body>
</html>


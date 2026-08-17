<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Drop Play — Panjat Pinang Kemerdekaan
    </title>


    <style>
/* =========================================================
   PANJAT PINANG UI V2
   Modern / mobile-first / no leaderboard flicker
   ========================================================= */

*,
*::before,
*::after {
    box-sizing: border-box;
}

:root {
    --red: #d7193f;
    --red-dark: #9f1230;
    --red-soft: #fff0f3;

    --cream: #fff9f1;
    --cream-2: #f6eee3;
    --paper: #fffdf9;
    --ink: #211b17;
    --muted: #8d8176;
    --line: rgba(53, 34, 22, .09);

    --gold: #e7b52f;
    --gold-soft: #fff2bd;

    --green: #4e873f;
    --brown: #74431f;

    --shadow-xl: 0 28px 80px rgba(66, 17, 29, .18);
    --shadow-lg: 0 18px 48px rgba(66, 17, 29, .13);
    --shadow-md: 0 10px 28px rgba(66, 17, 29, .09);
}

html {
    scroll-behavior: smooth;
}

body {
    min-height: 100vh;
    margin: 0;
    overflow-x: hidden;
    color: var(--ink);
    font-family: Inter, ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont,
        "Segoe UI", Arial, Helvetica, sans-serif;
    background:
        radial-gradient(circle at 50% -10%, rgba(255,255,255,.28), transparent 30%),
        linear-gradient(
            180deg,
            #c91838 0,
            #e85b70 220px,
            #f6b9b5 410px,
            #fff1e3 650px,
            #fff9f1 100%
        );
}

body::before {
    content: "";
    position: fixed;
    inset: 0;
    z-index: 0;
    pointer-events: none;
    opacity: .09;
    background-image:
        radial-gradient(circle, #fff 1px, transparent 1px);
    background-size: 28px 28px;
}

.page {
    position: relative;
    z-index: 2;
    width: min(1180px, calc(100% - 28px));
    margin: 0 auto;
    padding: 18px 0 50px;
}

/* ---------------- HEADER ---------------- */

.header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 18px;
}

.brand {
    display: flex;
    align-items: center;
    gap: 10px;
}

.brand-logo {
    display: block;
    width: 126px;
    height: auto;
}

.brand-label {
    padding: 7px 11px;
    border: 1px solid rgba(255,255,255,.2);
    border-radius: 999px;
    color: rgba(255,255,255,.9);
    background: rgba(74, 4, 22, .18);
    backdrop-filter: blur(12px);
    font-size: 8px;
    font-weight: 900;
    letter-spacing: 1px;
}

.countdown {
    display: flex;
    align-items: center;
    gap: 9px;
    padding: 8px;
    border: 1px solid rgba(255,255,255,.2);
    border-radius: 17px;
    background: rgba(74, 4, 22, .2);
    backdrop-filter: blur(14px);
    box-shadow: 0 12px 30px rgba(70, 0, 18, .12);
}

.countdown-label {
    text-align: right;
    color: rgba(255,255,255,.72);
    font-size: 7px;
    line-height: 1.3;
    font-weight: 900;
    letter-spacing: .8px;
}

.timer {
    display: flex;
    gap: 4px;
}

.timer-box {
    min-width: 45px;
    padding: 7px 5px;
    border: 1px solid rgba(255,255,255,.16);
    border-radius: 10px;
    background: rgba(255,255,255,.11);
    text-align: center;
}

.timer-number {
    color: #fff;
    font-size: 15px;
    line-height: 1;
    font-weight: 1000;
}

.timer-label {
    margin-top: 3px;
    color: rgba(255,255,255,.5);
    font-size: 5px;
    font-weight: 900;
}

/* ---------------- HERO ---------------- */

.hero {
    padding: 54px 20px 34px;
    text-align: center;
    color: #fff;
}

.hero-badge {
    display: inline-flex;
    align-items: center;
    gap: 7px;
    padding: 8px 13px;
    border: 1px solid rgba(255,255,255,.22);
    border-radius: 999px;
    background: rgba(255,255,255,.1);
    backdrop-filter: blur(10px);
    font-size: 8px;
    font-weight: 1000;
    letter-spacing: 1px;
}

.hero-title {
    margin: 18px 0 0;
    font-size: clamp(58px, 8vw, 96px);
    line-height: .82;
    letter-spacing: -6px;
    font-weight: 1000;
    text-transform: uppercase;
    text-shadow: 0 9px 0 rgba(110,0,15,.11);
}

.hero-title span {
    display: block;
    color: #fff1ad;
}

.hero-description {
    max-width: 610px;
    margin: 20px auto 0;
    color: rgba(255,255,255,.82);
    font-size: 12px;
    line-height: 1.75;
}

/* ---------------- EVENT CARD ---------------- */

.event-card {
    overflow: hidden;
    border: 1px solid rgba(255,255,255,.72);
    border-radius: 32px;
    background: rgba(255,250,243,.97);
    box-shadow: var(--shadow-xl);
}

.event-bar {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 12px;
    padding: 15px 20px;
    border-bottom: 1px solid var(--line);
    background: rgba(255,255,255,.86);
}

.event-bar-title {
    display: flex;
    align-items: center;
    gap: 8px;
    color: #4f463d;
    font-size: 9px;
    font-weight: 1000;
    letter-spacing: .8px;
    text-transform: uppercase;
}

.event-bar-title::before {
    content: "🧗";
    font-size: 16px;
}

.live {
    display: flex;
    align-items: center;
    gap: 6px;
    color: var(--red);
    font-size: 7px;
    font-weight: 1000;
    letter-spacing: 1px;
}

.live-dot {
    width: 7px;
    height: 7px;
    border-radius: 50%;
    background: var(--red);
    box-shadow: 0 0 0 4px rgba(215,25,63,.1);
}

/* ---------------- STATUS ---------------- */

.event-status {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 1px;
    background: #eadfd1;
}

.status-box {
    padding: 15px 12px;
    background: #fff;
    text-align: center;
}

.status-label {
    color: #a1978b;
    font-size: 7px;
    font-weight: 900;
    letter-spacing: .8px;
}

.status-value {
    margin-top: 4px;
    color: #26211d;
    font-size: 17px;
    font-weight: 1000;
}

.status-value.red {
    color: var(--red);
}

/* ---------------- STAGE ---------------- */

.stage-wrap {
    position: relative;
    background: #f4e4ca;
}

.stage-scroll {
    position: relative;
    height: 780px;
    overflow-y: auto;
    overflow-x: hidden;
    scrollbar-width: thin;
    scrollbar-color: rgba(113,62,26,.42) rgba(255,255,255,.2);
}

.stage-scroll::-webkit-scrollbar {
    width: 9px;
}

.stage-scroll::-webkit-scrollbar-track {
    background: rgba(255,255,255,.1);
}

.stage-scroll::-webkit-scrollbar-thumb {
    border-radius: 999px;
    background: rgba(113,62,26,.42);
}

.stage {
    position: relative;
    min-height: 2350px;
    background-image: url('{{ asset('images/event/background/village-bg.webp') }}');
    background-size: cover;
    background-position: center top;
    background-repeat: no-repeat;
}

.stage::before {
    content: "";
    position: absolute;
    inset: 0;
    z-index: 1;
    pointer-events: none;
    background: linear-gradient(
        180deg,
        rgba(255,250,241,.08),
        rgba(255,238,211,.24)
    );
}

.stage-heading {
    position: sticky;
    top: 15px;
    left: 20px;
    z-index: 100;
    width: max-content;
    margin: 15px 0 0 18px;
    padding: 8px 11px;
    border: 1px solid rgba(255,255,255,.5);
    border-radius: 10px;
    background: rgba(62,32,16,.42);
    backdrop-filter: blur(10px);
    color: #fff;
    font-size: 7px;
    font-weight: 1000;
    letter-spacing: 1px;
    text-transform: uppercase;
}

.pole {
    position: absolute;
    top: 105px;
    bottom: 55px;
    left: 50%;
    z-index: 10;
    width: 46px;
    transform: translateX(-50%);
    border-radius: 25px;
    background:
        linear-gradient(
            90deg,
            #5d3218 0%,
            #824719 18%,
            #b86d2f 42%,
            #ce813a 50%,
            #9b5725 73%,
            #603418 100%
        );
    box-shadow: 12px 0 0 rgba(0,0,0,.08);
}

.pole::before {
    content: "";
    position: absolute;
    left: 7px;
    top: 0;
    width: 5px;
    height: 100%;
    border-radius: 999px;
    background: rgba(255,255,255,.14);
}

.crossbar {
    position: absolute;
    top: 85px;
    left: 50%;
    z-index: 12;
    width: 480px;
    max-width: 70%;
    height: 24px;
    transform: translateX(-50%);
    border-radius: 999px;
    background: linear-gradient(180deg, #a7602b, #703b18);
    box-shadow: 0 7px 0 rgba(69,32,10,.1);
}

.crossbar-center {
    position: absolute;
    top: 68px;
    left: 50%;
    z-index: 13;
    width: 78px;
    height: 37px;
    transform: translateX(-50%);
    border-radius: 30px 30px 12px 12px;
    background: #914e1d;
}

.reward-slot {
    position: absolute;
    left: 50%;
    z-index: 30;
    width: 100%;
    height: 105px;
    transform: translateX(-50%);
    pointer-events: none;
}

.reward-slot[data-level="17"] { top: 115px; }
.reward-slot[data-level="16"] { top: 235px; }
.reward-slot[data-level="15"] { top: 355px; }
.reward-slot[data-level="14"] { top: 475px; }
.reward-slot[data-level="13"] { top: 595px; }
.reward-slot[data-level="12"] { top: 715px; }
.reward-slot[data-level="11"] { top: 835px; }
.reward-slot[data-level="10"] { top: 955px; }
.reward-slot[data-level="9"]  { top: 1075px; }
.reward-slot[data-level="8"]  { top: 1195px; }
.reward-slot[data-level="7"]  { top: 1315px; }
.reward-slot[data-level="6"]  { top: 1435px; }
.reward-slot[data-level="5"]  { top: 1555px; }
.reward-slot[data-level="4"]  { top: 1675px; }
.reward-slot[data-level="3"]  { top: 1795px; }
.reward-slot[data-level="2"]  { top: 1915px; }
.reward-slot[data-level="1"]  { top: 2035px; }

.reward-card {
    position: absolute;
    top: 0;
    width: 205px;
    min-height: 92px;
    padding: 12px;
    border: 1px solid rgba(83,49,25,.1);
    border-radius: 18px;
    background: rgba(255,255,255,.93);
    box-shadow: 0 14px 30px rgba(70,35,15,.1);
    backdrop-filter: blur(5px);
}

.reward-slot[data-level="17"] .reward-card,
.reward-slot[data-level="15"] .reward-card,
.reward-slot[data-level="13"] .reward-card,
.reward-slot[data-level="11"] .reward-card,
.reward-slot[data-level="9"] .reward-card,
.reward-slot[data-level="7"] .reward-card,
.reward-slot[data-level="5"] .reward-card,
.reward-slot[data-level="3"] .reward-card,
.reward-slot[data-level="1"] .reward-card {
    left: calc(50% - 350px);
}

.reward-slot[data-level="16"] .reward-card,
.reward-slot[data-level="14"] .reward-card,
.reward-slot[data-level="12"] .reward-card,
.reward-slot[data-level="10"] .reward-card,
.reward-slot[data-level="8"] .reward-card,
.reward-slot[data-level="6"] .reward-card,
.reward-slot[data-level="4"] .reward-card,
.reward-slot[data-level="2"] .reward-card {
    right: calc(50% - 350px);
}

.reward-card::after {
    content: "";
    position: absolute;
    top: 50%;
    width: 75px;
    height: 3px;
    transform: translateY(-50%);
    background: #9f5e2a;
}

.reward-slot[data-level="17"] .reward-card::after,
.reward-slot[data-level="15"] .reward-card::after,
.reward-slot[data-level="13"] .reward-card::after,
.reward-slot[data-level="11"] .reward-card::after,
.reward-slot[data-level="9"] .reward-card::after,
.reward-slot[data-level="7"] .reward-card::after,
.reward-slot[data-level="5"] .reward-card::after,
.reward-slot[data-level="3"] .reward-card::after,
.reward-slot[data-level="1"] .reward-card::after {
    right: -75px;
}

.reward-slot[data-level="16"] .reward-card::after,
.reward-slot[data-level="14"] .reward-card::after,
.reward-slot[data-level="12"] .reward-card::after,
.reward-slot[data-level="10"] .reward-card::after,
.reward-slot[data-level="8"] .reward-card::after,
.reward-slot[data-level="6"] .reward-card::after,
.reward-slot[data-level="4"] .reward-card::after,
.reward-slot[data-level="2"] .reward-card::after {
    left: -75px;
}

.reward-top {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 8px;
}

.reward-level {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    min-width: 35px;
    padding: 4px 7px;
    border-radius: 999px;
    background: #eee8de;
    color: #8e8376;
    font-size: 7px;
    font-weight: 1000;
}

.reward-icon {
    display: grid;
    place-items: center;
    width: 35px;
    height: 35px;
    border-radius: 10px;
    background: #fff5d7;
    font-size: 21px;
}

.reward-name {
    margin-top: 8px;
    color: #4f473e;
    font-size: 10px;
    font-weight: 1000;
    text-transform: uppercase;
}

.reward-holder {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    max-width: 100%;
    margin-top: 6px;
    padding: 5px 8px;
    border-radius: 999px;
    background: #efe9e0;
    color: #8c8175;
    font-size: 7px;
    font-weight: 900;
}

.reward-holder.occupied {
    background: var(--gold-soft);
    color: #7f5d07;
}

.holder-avatar {
    display: grid;
    flex: 0 0 18px;
    place-items: center;
    width: 18px;
    height: 18px;
    border-radius: 50%;
    background: #d9d3ca;
    color: #655d54;
    font-size: 7px;
    font-weight: 1000;
    overflow: hidden;
}
.holder-avatar img {
    width: 100%;
    height: 100%;
    display: block;
    object-fit: cover;
    border-radius: 50%;
}
.reward-holder.occupied .holder-avatar {
    background: var(--red);
    color: #fff;
}

.climber-marker {
    position: absolute;
    top: 13px;
    left: 50%;
    z-index: 50;
    display: grid;
    place-items: center;
    width: 56px;
    height: 56px;
    transform: translateX(-50%);
    border: 2px solid rgba(255,255,255,.85);
    border-radius: 50%;
    background: rgba(229,35,63,.92);
    box-shadow: 0 10px 18px rgba(60,10,18,.22);
    color: #fff;
    font-size: 24px;
    overflow: hidden !important;
}
.climber-marker img {
    display: block;
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 50%;
}
.climber-marker.empty {
    opacity: .2;
    background: rgba(100,80,60,.35);
}

.stage-bottom {
    position: absolute;
    right: 0;
    bottom: 0;
    left: 0;
    z-index: 60;
    height: 90px;
    pointer-events: none;
    background: linear-gradient(
        180deg,
        rgba(82,135,52,0),
        rgba(67,112,44,.98)
    );
}

.scroll-tip {
    position: absolute;
    right: 18px;
    bottom: 18px;
    z-index: 100;
    padding: 7px 9px;
    border-radius: 999px;
    background: rgba(48,31,16,.55);
    backdrop-filter: blur(8px);
    color: #fff;
    font-size: 7px;
    font-weight: 900;
}

/* =========================================================
   TOP SPENDER V2
   ========================================================= */

.leaderboard {
    position: relative;
    overflow: hidden;
    margin-top: 24px;
    padding: 28px;
    border: 1px solid rgba(255,255,255,.8);
    border-radius: 30px;
    background:
        radial-gradient(circle at 50% -30%, rgba(231,181,47,.18), transparent 38%),
        linear-gradient(145deg, rgba(255,255,255,.99), rgba(249,244,236,.98));
    box-shadow: 0 24px 70px rgba(78,10,20,.14);
}

.leaderboard::before {
    content: "";
    position: absolute;
    width: 260px;
    height: 260px;
    top: -190px;
    right: -90px;
    border-radius: 50%;
    background: rgba(231,181,47,.12);
    filter: blur(10px);
    pointer-events: none;
}

.leader-head {
    position: relative;
    z-index: 2;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 16px;
    margin-bottom: 24px;
}

.leader-title {
    display: flex;
    align-items: center;
    gap: 12px;
}

.leader-icon {
    display: grid;
    place-items: center;
    width: 48px;
    height: 48px;
    border-radius: 15px;
    background: linear-gradient(145deg, #fff4bf, #ffe39a);
    box-shadow: 0 9px 22px rgba(239,182,51,.2);
    font-size: 22px;
}

.leader-heading h2 {
    margin: 0;
    color: #251f1a;
    font-size: 21px;
    line-height: 1;
    letter-spacing: -.7px;
}

.leader-heading p {
    margin: 5px 0 0;
    color: #9d9387;
    font-size: 9px;
}

.leader-live {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 7px 10px;
    border: 1px solid rgba(215,25,63,.1);
    border-radius: 999px;
    background: var(--red-soft);
    color: var(--red);
    font-size: 7px;
    font-weight: 1000;
    letter-spacing: .8px;
}

.leader-live::before {
    content: "";
    width: 6px;
    height: 6px;
    border-radius: 50%;
    background: var(--red);
}

.top-three {
    display: grid;
    grid-template-columns: 1fr 1.08fr 1fr;
    align-items: end;
    gap: 12px;
    max-width: 780px;
    margin: 0 auto 16px;
}

.podium {
    position: relative;
    overflow: hidden;
    min-width: 0;
    padding: 18px 10px 16px;
    border: 1px solid rgba(80,60,40,.08);
    border-radius: 22px;
    background: linear-gradient(145deg, #fff, #f7f3ed);
    box-shadow: 0 12px 30px rgba(70,35,15,.07);
}

.podium.first {
    transform: translateY(-10px);
    border-color: rgba(231,181,47,.55);
    background:
        radial-gradient(circle at 50% -30%, rgba(255,255,255,.95), transparent 45%),
        linear-gradient(145deg, #fff9dc, #ffedaf);
    box-shadow: 0 18px 42px rgba(180,126,12,.16);
}

.podium-medal {
    position: relative;
    z-index: 2;
    font-size: 29px;
    line-height: 1;
}

.podium-avatar {
    position: relative;
    z-index: 2;
    display: grid;
    place-items: center;
    width: 48px;
    height: 48px;
    margin: 9px auto;
    border: 3px solid #fff;
    border-radius: 50%;
    background: linear-gradient(145deg, #e7e0d7, #d4cdc3);
    box-shadow: 0 7px 16px rgba(70,35,15,.1);
    color: #5e554c;
    font-size: 13px;
    font-weight: 1000;
    overflow: hidden;
}

.podium-avatar img {
    display: block;
    width: 100%;
    height: 100%;
    object-fit: cover;
}
.podium.first .podium-avatar {
    width: 61px;
    height: 61px;
    border-color: #fff6cf;
    background: linear-gradient(145deg, var(--red), #b9162e);
    color: #fff;
    box-shadow: 0 10px 24px rgba(185,22,46,.22);
    font-size: 16px;
}

.podium-name {
    position: relative;
    z-index: 2;
    max-width: 100%;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
    color: #312a24;
    font-size: 10px;
    font-weight: 1000;
}

.podium.first .podium-name {
    font-size: 11px;
}

.podium-rank {
    position: relative;
    z-index: 2;
    margin-top: 4px;
    color: #9e9487;
    font-size: 7px;
    font-weight: 900;
    letter-spacing: .7px;
}

.other-ranks {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 10px;
    max-width: 780px;
    margin: 0 auto;
}

.rank {
    display: flex;
    align-items: center;
    min-width: 0;
    gap: 9px;
    min-height: 56px;
    padding: 9px 11px;
    border: 1px solid rgba(80,60,40,.07);
    border-radius: 16px;
    background: rgba(247,245,241,.82);
    box-shadow: inset 0 1px 0 rgba(255,255,255,.75);
}

.rank-number {
    min-width: 23px;
    color: #7e7469;
    font-size: 9px;
    font-weight: 1000;
}

.rank-avatar {
    display: grid;
    flex: 0 0 31px;
    place-items: center;
    width: 31px;
    height: 31px;
    border-radius: 50%;
    background: linear-gradient(145deg, #e8e3dc, #d9d2c9);
    color: #655c53;
    font-size: 9px;
    font-weight: 1000;
    overflow: hidden;
}

.rank-name {
    min-width: 0;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
    color: #40382f;
    font-size: 9px;
    font-weight: 900;
}

.rank-avatar img {
    display: block;
    width: 100%;
    height: 100%;
    object-fit: cover;
}
.empty-ranking {
    grid-column: 1 / -1;
    padding: 30px 18px;
    border: 1px dashed rgba(80,60,40,.12);
    border-radius: 18px;
    background: #f7f5f1;
    text-align: center;
    color: #958b80;
    font-size: 11px;
    font-weight: 800;
}

/* ---------------- FOOTER ---------------- */

.footer {
    padding: 24px 0 4px;
    color: rgba(255,255,255,.74);
    text-align: center;
    font-size: 8px;
    font-weight: 900;
    letter-spacing: 1px;
}

/* ---------------- TABLET ---------------- */

@media (max-width: 900px) {
    .stage-scroll {
        height: 720px;
    }

    .reward-card {
        width: 175px;
    }

    .reward-slot[data-level="17"] .reward-card,
    .reward-slot[data-level="15"] .reward-card,
    .reward-slot[data-level="13"] .reward-card,
    .reward-slot[data-level="11"] .reward-card,
    .reward-slot[data-level="9"] .reward-card,
    .reward-slot[data-level="7"] .reward-card,
    .reward-slot[data-level="5"] .reward-card,
    .reward-slot[data-level="3"] .reward-card,
    .reward-slot[data-level="1"] .reward-card {
        left: calc(50% - 300px);
    }

    .reward-slot[data-level="16"] .reward-card,
    .reward-slot[data-level="14"] .reward-card,
    .reward-slot[data-level="12"] .reward-card,
    .reward-slot[data-level="10"] .reward-card,
    .reward-slot[data-level="8"] .reward-card,
    .reward-slot[data-level="6"] .reward-card,
    .reward-slot[data-level="4"] .reward-card,
    .reward-slot[data-level="2"] .reward-card {
        right: calc(50% - 300px);
    }
}

/* ---------------- MOBILE ---------------- */

@media (max-width: 650px) {
    .page {
        width: calc(100% - 10px);
        padding-top: 10px;
    }

    .brand-logo {
        width: 88px;
    }

    .brand-label,
    .countdown-label {
        display: none;
    }

    .countdown {
        padding: 5px;
        border-radius: 11px;
    }

    .timer {
        gap: 3px;
    }

    .timer-box {
        min-width: 35px;
        padding: 6px 3px;
    }

    .timer-number {
        font-size: 11px;
    }

    .hero {
        padding: 34px 10px 24px;
    }

    .hero-title {
        font-size: 48px;
        letter-spacing: -3px;
    }

    .hero-description {
        max-width: 340px;
        font-size: 10px;
    }

    .event-card {
        border-radius: 23px;
    }

    .event-bar {
        padding: 11px 13px;
    }

    .event-bar-title {
        font-size: 7px;
    }

    .live {
        font-size: 6px;
    }

    .event-status {
        grid-template-columns: repeat(3, 1fr);
    }

    .status-box {
        padding: 10px 5px;
    }

    .status-label {
        font-size: 5px;
    }

    .status-value {
        font-size: 13px;
    }

    .stage-scroll {
        height: 670px;
    }

    .stage {
        min-height: 2100px;
    }

    .stage-heading {
        top: 10px;
        margin: 10px 0 0 10px;
        font-size: 6px;
    }

    .pole {
        top: 90px;
        width: 32px;
        bottom: 40px;
    }

    .crossbar {
        top: 66px;
        width: 240px;
        height: 17px;
    }

    .crossbar-center {
        top: 53px;
        width: 54px;
        height: 28px;
    }

    .reward-card {
        width: 112px;
        min-height: 84px;
        padding: 9px;
        border-radius: 13px;
    }

    .reward-slot[data-level="17"] .reward-card,
    .reward-slot[data-level="15"] .reward-card,
    .reward-slot[data-level="13"] .reward-card,
    .reward-slot[data-level="11"] .reward-card,
    .reward-slot[data-level="9"] .reward-card,
    .reward-slot[data-level="7"] .reward-card,
    .reward-slot[data-level="5"] .reward-card,
    .reward-slot[data-level="3"] .reward-card,
    .reward-slot[data-level="1"] .reward-card {
        left: 3%;
    }

    .reward-slot[data-level="16"] .reward-card,
    .reward-slot[data-level="14"] .reward-card,
    .reward-slot[data-level="12"] .reward-card,
    .reward-slot[data-level="10"] .reward-card,
    .reward-slot[data-level="8"] .reward-card,
    .reward-slot[data-level="6"] .reward-card,
    .reward-slot[data-level="4"] .reward-card,
    .reward-slot[data-level="2"] .reward-card {
        right: 3%;
    }

    .reward-card::after {
        width: 27px;
    }

    .reward-slot[data-level="17"] .reward-card::after,
    .reward-slot[data-level="15"] .reward-card::after,
    .reward-slot[data-level="13"] .reward-card::after,
    .reward-slot[data-level="11"] .reward-card::after,
    .reward-slot[data-level="9"] .reward-card::after,
    .reward-slot[data-level="7"] .reward-card::after,
    .reward-slot[data-level="5"] .reward-card::after,
    .reward-slot[data-level="3"] .reward-card::after,
    .reward-slot[data-level="1"] .reward-card::after {
        right: -27px;
    }

    .reward-slot[data-level="16"] .reward-card::after,
    .reward-slot[data-level="14"] .reward-card::after,
    .reward-slot[data-level="12"] .reward-card::after,
    .reward-slot[data-level="10"] .reward-card::after,
    .reward-slot[data-level="8"] .reward-card::after,
    .reward-slot[data-level="6"] .reward-card::after,
    .reward-slot[data-level="4"] .reward-card::after,
    .reward-slot[data-level="2"] .reward-card::after {
        left: -27px;
    }

    .reward-level {
        min-width: 25px;
        font-size: 5px;
    }

    .reward-icon {
        width: 29px;
        height: 29px;
        font-size: 17px;
    }

    .reward-name {
        margin-top: 5px;
        font-size: 7px;
    }

    .reward-holder {
        max-width: 100%;
        margin-top: 4px;
        padding: 4px 6px;
        font-size: 5px;
    }

    .holder-avatar {
        flex-basis: 15px;
        width: 15px;
        height: 15px;
        font-size: 6px;
    }

    .climber-marker {
        width: 44px;
        height: 44px;
        font-size: 19px;
    }

    .scroll-tip {
        font-size: 6px;
    }

    /* Leaderboard becomes a clean mobile feed */
    .leaderboard {
        margin-top: 14px;
        padding: 16px;
        border-radius: 23px;
    }

    .leader-head {
        align-items: flex-start;
        margin-bottom: 20px;
    }

    .leader-icon {
        width: 37px;
        height: 37px;
        border-radius: 12px;
        font-size: 18px;
    }

    .leader-heading h2 {
        font-size: 15px;
    }

    .leader-heading p {
        font-size: 7px;
    }

    .leader-live {
        padding: 6px 8px;
        font-size: 5px;
    }

    .top-three {
        gap: 5px;
        margin-bottom: 12px;
    }

    .podium {
        padding: 12px 4px 10px;
        border-radius: 16px;
    }

    .podium.first {
        transform: translateY(-7px);
    }

    .podium-medal {
        font-size: 20px;
    }

    .podium-avatar {
        width: 34px;
        height: 34px;
        margin: 5px auto;
        font-size: 10px;
    }

    .podium.first .podium-avatar {
        width: 42px;
        height: 42px;
        font-size: 12px;
    }

    .podium-name,
    .podium.first .podium-name {
        font-size: 7px;
    }

    .podium-rank {
        font-size: 5px;
    }

    .other-ranks {
        grid-template-columns: 1fr;
        gap: 6px;
    }

    .rank {
        min-height: 45px;
        padding: 7px 8px;
        border-radius: 12px;
    }

    .rank-number {
        font-size: 7px;
    }

    .rank-avatar {
        flex-basis: 25px;
        width: 25px;
        height: 25px;
        font-size: 7px;
    }

    .rank-name {
        font-size: 7px;
    }
}

@media (max-width: 390px) {
    .hero-title {
        font-size: 42px;
    }

    .stage-scroll {
        height: 630px;
    }

    .stage {
        min-height: 2080px;
    }

    .leaderboard {
        padding: 13px;
    }
}
</style>
<style>
/* =========================================================
   PANJAT PINANG V3 — GAME BOARD POLISH
   ========================================================= */

.stage-wrap {
    position: relative;
    isolation: isolate;
    border-top: 1px solid rgba(87,48,20,.08);
    background:
        linear-gradient(180deg, #f2e0c2, #ead1a8);
}

.stage-scroll {
    scroll-behavior: smooth;
    overscroll-behavior: contain;
}

/* A subtle "game board" frame */
.stage {
    background-position: center top;
}

.stage::after {
    content: "";
    position: absolute;
    inset: 0;
    z-index: 2;
    pointer-events: none;
    background:
        radial-gradient(circle at 50% 9%, rgba(255,255,255,.18), transparent 24%),
        linear-gradient(
            90deg,
            rgba(255,255,255,.10),
            transparent 18%,
            transparent 82%,
            rgba(83,43,16,.08)
        );
}

/* Make the pole feel like the central game object */
.pole {
    z-index: 12;
    width: 48px;
    border: 2px solid rgba(67,31,12,.18);
    box-shadow:
        9px 0 0 rgba(0,0,0,.07),
        0 0 0 10px rgba(255,255,255,.035),
        inset 4px 0 8px rgba(255,255,255,.11),
        inset -5px 0 8px rgba(48,20,6,.13);
}

.pole::after {
    content: "";
    position: absolute;
    inset: 0;
    border-radius: inherit;
    background:
        repeating-linear-gradient(
            0deg,
            rgba(255,255,255,.03) 0 7px,
            rgba(74,32,11,.04) 7px 14px
        );
    pointer-events: none;
}

.crossbar {
    z-index: 15;
    height: 25px;
    border: 2px solid rgba(66,31,12,.18);
    box-shadow:
        0 7px 0 rgba(69,32,10,.10),
        inset 0 3px 6px rgba(255,255,255,.10);
}

.crossbar-center {
    z-index: 16;
    border: 2px solid rgba(65,30,11,.16);
    box-shadow:
        0 7px 12px rgba(67,31,12,.12),
        inset 0 3px 5px rgba(255,255,255,.10);
}

/* Level rails become part of the game board */
.reward-slot {
    z-index: 40;
}

.reward-slot::before {
    content: attr(data-level);
    position: absolute;
    top: 35px;
    left: 50%;
    z-index: 1;
    display: grid;
    place-items: center;
    width: 27px;
    height: 27px;
    transform: translateX(-50%);
    border: 2px solid rgba(255,255,255,.72);
    border-radius: 50%;
    background: rgba(92,49,19,.72);
    box-shadow: 0 4px 10px rgba(55,26,8,.14);
    color: #fff;
    font-size: 7px;
    font-weight: 1000;
    letter-spacing: .3px;
}

.reward-card {
    z-index: 5;
    min-height: 98px;
    border: 1px solid rgba(96,55,22,.10);
    border-radius: 20px;
    background:
        linear-gradient(145deg, rgba(255,255,255,.97), rgba(249,243,233,.96));
    box-shadow:
        0 14px 28px rgba(69,34,12,.10),
        0 2px 0 rgba(255,255,255,.8) inset;
    transition:
        transform .25s ease,
        box-shadow .25s ease,
        border-color .25s ease;
}

.reward-card:hover {
    transform: translateY(-3px);
    border-color: rgba(231,181,47,.36);
    box-shadow:
        0 18px 34px rgba(69,34,12,.14),
        0 2px 0 rgba(255,255,255,.8) inset;
}

/* Level 17 = visual grand-prize emphasis only.
   Reward content and unlock logic remain unchanged. */
.reward-slot[data-level="17"] .reward-card {
    border-color: rgba(231,181,47,.65);
    background:
        radial-gradient(circle at 75% 0%, rgba(255,241,166,.52), transparent 45%),
        linear-gradient(145deg, #fffdf0, #fff1c4);
    box-shadow:
        0 20px 42px rgba(161,108,7,.17),
        0 0 0 1px rgba(255,255,255,.65) inset;
}

.reward-slot[data-level="17"] .reward-level {
    background: #f8e5a3;
    color: #765400;
}

.reward-slot[data-level="17"] .reward-icon {
    background: #fff0b6;
    box-shadow: 0 7px 14px rgba(231,181,47,.14);
}

/* Holder state is much easier to scan */
.reward-holder.occupied {
    box-shadow: 0 4px 10px rgba(231,181,47,.11);
}

.reward-holder.occupied .holder-avatar {
    box-shadow: 0 0 0 3px rgba(215,25,63,.08);
}

/* Climber marker gets a stronger "current player" feeling */
.climber-marker {
    border: 3px solid rgba(255,255,255,.88);
    box-shadow:
        0 10px 20px rgba(60,10,18,.22),
        0 0 0 6px rgba(215,25,63,.08);
}

/* Sticky board label becomes a compact game HUD */
.stage-heading {
    display: flex;
    align-items: center;
    gap: 6px;
    border-color: rgba(255,255,255,.34);
    background: rgba(54,29,14,.48);
    box-shadow: 0 8px 18px rgba(49,24,8,.12);
}

.stage-heading::before {
    content: "🏆";
    font-size: 11px;
}

/* Bottom green zone looks more intentional */
.stage-bottom {
    height: 120px;
    background:
        linear-gradient(
            180deg,
            rgba(69,116,44,0),
            rgba(61,107,42,.94) 70%,
            rgba(49,89,36,1)
        );
}

/* Mobile: keep both reward cards and pole visually connected */
@media (max-width: 650px) {
    .stage-scroll {
        height: 670px;
    }

    .stage {
        min-height: 2100px;
    }

    .pole {
        width: 34px;
    }

    .crossbar {
        height: 18px;
    }

    .reward-slot::before {
        top: 36px;
        width: 23px;
        height: 23px;
        font-size: 6px;
    }

    .reward-card {
        min-height: 86px;
        border-radius: 14px;
        box-shadow:
            0 10px 22px rgba(69,34,12,.10),
            0 2px 0 rgba(255,255,255,.8) inset;
    }

    .reward-card:hover {
        transform: none;
    }

    .stage-heading {
        padding: 7px 9px;
        font-size: 5.5px;
    }

    .stage-heading::before {
        font-size: 9px;
    }
}
</style>
<style>
/* =========================================================
   PANJAT PINANG V4
   FINAL RESPONSIVE STAGE FIX
   ========================================================= */

/*
   IMPORTANT:
   The stage is intentionally taller than the visible window.
   Users scroll INSIDE .stage-scroll to climb the pole.
*/

.stage-scroll {
    position: relative;
    height: 680px;
    overflow-y: auto;
    overflow-x: hidden;
    overscroll-behavior: contain;
    -webkit-overflow-scrolling: touch;
}

/* Ground must NEVER cover reward cards. */
.stage-bottom {
    z-index: 5 !important;
    height: 72px !important;
    background:
        linear-gradient(
            180deg,
            rgba(67,112,44,0),
            rgba(67,112,44,.72) 55%,
            rgba(49,89,36,.96) 100%
        ) !important;
}

/*
   Reward slots/cards always stay above the ground.
*/
.reward-slot {
    z-index: 40 !important;
}

.reward-card {
    z-index: 45 !important;
}

/*
   Use a responsive stage layout BEFORE the phone breakpoint.
   This is deliberately 1100px rather than 650/900px because
   mobile browsers can report a larger CSS viewport.
*/
@media (max-width: 1100px) {

    .stage-scroll {
        height: 680px;
    }

    .stage {
        min-height: 2100px;
    }

    .pole {
        width: 34px;
    }

    .crossbar {
        width: 260px;
        height: 18px;
    }

    .crossbar-center {
        width: 54px;
        height: 28px;
    }

    .reward-card {
        width: 118px;
        min-height: 86px;
        padding: 9px;
        border-radius: 14px;
    }

    /*
       LEFT SIDE
    */
    .reward-slot[data-level="17"] .reward-card,
    .reward-slot[data-level="15"] .reward-card,
    .reward-slot[data-level="13"] .reward-card,
    .reward-slot[data-level="11"] .reward-card,
    .reward-slot[data-level="9"] .reward-card,
    .reward-slot[data-level="7"] .reward-card,
    .reward-slot[data-level="5"] .reward-card,
    .reward-slot[data-level="3"] .reward-card,
    .reward-slot[data-level="1"] .reward-card {
        left: 3%;
    }

    /*
       RIGHT SIDE
    */
    .reward-slot[data-level="16"] .reward-card,
    .reward-slot[data-level="14"] .reward-card,
    .reward-slot[data-level="12"] .reward-card,
    .reward-slot[data-level="10"] .reward-card,
    .reward-slot[data-level="8"] .reward-card,
    .reward-slot[data-level="6"] .reward-card,
    .reward-slot[data-level="4"] .reward-card,
    .reward-slot[data-level="2"] .reward-card {
        right: 3%;
    }

    /*
       Connector reaches from card to pole,
       not through the card.
    */
    .reward-card::after {
        width: 34px;
        height: 3px;
    }

    .reward-slot[data-level="17"] .reward-card::after,
    .reward-slot[data-level="15"] .reward-card::after,
    .reward-slot[data-level="13"] .reward-card::after,
    .reward-slot[data-level="11"] .reward-card::after,
    .reward-slot[data-level="9"] .reward-card::after,
    .reward-slot[data-level="7"] .reward-card::after,
    .reward-slot[data-level="5"] .reward-card::after,
    .reward-slot[data-level="3"] .reward-card::after,
    .reward-slot[data-level="1"] .reward-card::after {
        right: -34px;
    }

    .reward-slot[data-level="16"] .reward-card::after,
    .reward-slot[data-level="14"] .reward-card::after,
    .reward-slot[data-level="12"] .reward-card::after,
    .reward-slot[data-level="10"] .reward-card::after,
    .reward-slot[data-level="8"] .reward-card::after,
    .reward-slot[data-level="6"] .reward-card::after,
    .reward-slot[data-level="4"] .reward-card::after,
    .reward-slot[data-level="2"] .reward-card::after {
        left: -34px;
    }

    /*
       Compact card typography.
    */
    .reward-level {
        min-width: 28px;
        padding: 4px 6px;
        font-size: 5px;
    }

    .reward-icon {
        width: 30px;
        height: 30px;
        font-size: 17px;
    }

    .reward-name {
        margin-top: 5px;
        font-size: 7px;
    }

    .reward-holder {
        margin-top: 4px;
        padding: 4px 6px;
        font-size: 5px;
    }

    .holder-avatar {
        width: 15px;
        height: 15px;
        flex-basis: 15px;
        font-size: 6px;
    }

    .reward-slot::before {
        top: 37px;
        width: 23px;
        height: 23px;
        font-size: 6px;
    }

    .climber-marker {
        width: 44px;
        height: 44px;
        font-size: 19px;
    }
}

/*
   TRUE PHONE.
*/
@media (max-width: 650px) {

    .page {
        width: calc(100% - 10px);
    }

    .stage-scroll {
        height: 640px;
    }

    .stage {
        min-height: 2100px;
    }

    .stage-heading {
        margin-left: 10px;
        padding: 7px 9px;
        font-size: 5.5px;
    }

    .pole {
        width: 32px;
    }

    .crossbar {
        width: 235px;
        height: 17px;
    }

    .crossbar-center {
        width: 52px;
        height: 27px;
    }

    .reward-card {
        width: 108px;
        min-height: 82px;
        padding: 8px;
        border-radius: 13px;
    }

    .reward-slot[data-level="17"] .reward-card,
    .reward-slot[data-level="15"] .reward-card,
    .reward-slot[data-level="13"] .reward-card,
    .reward-slot[data-level="11"] .reward-card,
    .reward-slot[data-level="9"] .reward-card,
    .reward-slot[data-level="7"] .reward-card,
    .reward-slot[data-level="5"] .reward-card,
    .reward-slot[data-level="3"] .reward-card,
    .reward-slot[data-level="1"] .reward-card {
        left: 2%;
    }

    .reward-slot[data-level="16"] .reward-card,
    .reward-slot[data-level="14"] .reward-card,
    .reward-slot[data-level="12"] .reward-card,
    .reward-slot[data-level="10"] .reward-card,
    .reward-slot[data-level="8"] .reward-card,
    .reward-slot[data-level="6"] .reward-card,
    .reward-slot[data-level="4"] .reward-card,
    .reward-slot[data-level="2"] .reward-card {
        right: 2%;
    }

    .reward-card::after {
        width: 30px;
    }

    .reward-slot[data-level="17"] .reward-card::after,
    .reward-slot[data-level="15"] .reward-card::after,
    .reward-slot[data-level="13"] .reward-card::after,
    .reward-slot[data-level="11"] .reward-card::after,
    .reward-slot[data-level="9"] .reward-card::after,
    .reward-slot[data-level="7"] .reward-card::after,
    .reward-slot[data-level="5"] .reward-card::after,
    .reward-slot[data-level="3"] .reward-card::after,
    .reward-slot[data-level="1"] .reward-card::after {
        right: -30px;
    }

    .reward-slot[data-level="16"] .reward-card::after,
    .reward-slot[data-level="14"] .reward-card::after,
    .reward-slot[data-level="12"] .reward-card::after,
    .reward-slot[data-level="10"] .reward-card::after,
    .reward-slot[data-level="8"] .reward-card::after,
    .reward-slot[data-level="6"] .reward-card::after,
    .reward-slot[data-level="4"] .reward-card::after,
    .reward-slot[data-level="2"] .reward-card::after {
        left: -30px;
    }

    .stage-bottom {
        height: 58px !important;
    }

    .scroll-tip {
        right: 10px;
        bottom: 10px;
    }
}

/*
   Very small phones.
*/
@media (max-width: 390px) {

    .stage-scroll {
        height: 610px;
    }

    .reward-card {
        width: 100px;
    }

    .crossbar {
        width: 215px;
    }
}
</style>


<style>
/* =========================================================
   PANJAT PINANG V5 — NATURAL TREE + LEVEL PATH
   ========================================================= */

/* Use the real transparent tree asset. Preserve aspect ratio. */
.panjat-pinang-base {
    position: absolute;
    top: 42px;
    left: 50%;
    z-index: 12;
    width: auto;
    height: 1900px;
    transform: translateX(-50%);
    pointer-events: none;
    display: flex;
    align-items: flex-start;
    justify-content: center;
}

.panjat-pinang-base img {
    display: block;
    width: auto;
    height: 100%;
    max-width: none;
    object-fit: contain;
    object-position: top center;
    user-select: none;
}

/* The old CSS pole and top bar are no longer used. */
.pole,
.crossbar,
.crossbar-center {
    display: none !important;
}

/* No artificial green base at the bottom. */
.stage-bottom {
    display: none !important;
}

/* Compact 17-level spacing so the tree stays natural. */
.stage {
    min-height: 1980px;
}

.reward-slot {
    height: 96px;
    z-index: 40 !important;
}

.reward-slot[data-level="17"] { top: 78px; }
.reward-slot[data-level="16"] { top: 183px; }
.reward-slot[data-level="15"] { top: 288px; }
.reward-slot[data-level="14"] { top: 393px; }
.reward-slot[data-level="13"] { top: 498px; }
.reward-slot[data-level="12"] { top: 603px; }
.reward-slot[data-level="11"] { top: 708px; }
.reward-slot[data-level="10"] { top: 813px; }
.reward-slot[data-level="9"]  { top: 918px; }
.reward-slot[data-level="8"]  { top: 1023px; }
.reward-slot[data-level="7"]  { top: 1128px; }
.reward-slot[data-level="6"]  { top: 1233px; }
.reward-slot[data-level="5"]  { top: 1338px; }
.reward-slot[data-level="4"]  { top: 1443px; }
.reward-slot[data-level="3"]  { top: 1548px; }
.reward-slot[data-level="2"]  { top: 1653px; }
.reward-slot[data-level="1"]  { top: 1758px; }

/* Small level marker on the tree. */
.reward-slot::before {
    content: attr(data-level) !important;
    position: absolute;
    top: 34px;
    left: 50%;
    z-index: 48;
    width: 26px;
    height: 26px;
    transform: translateX(-50%);
    display: grid;
    place-items: center;
    border: 2px solid rgba(255,255,255,.88);
    border-radius: 50%;
    background: rgba(89,48,18,.88);
    box-shadow:
        0 3px 10px rgba(50,23,7,.22),
        0 0 0 4px rgba(255,255,255,.13);
    color: #fff;
    font-size: 7px;
    font-weight: 1000;
    line-height: 1;
}

/* Connect each level marker to the next one. */
.reward-slot::after {
    content: "";
    position: absolute;
    top: 62px;
    left: 50%;
    z-index: 42;
    width: 3px;
    height: 77px;
    transform: translateX(-50%);
    border-radius: 999px;
    background:
        linear-gradient(
            180deg,
            rgba(89,48,18,.80),
            rgba(89,48,18,.50)
        );
    box-shadow:
        0 0 0 1px rgba(255,255,255,.10);
}

.reward-slot[data-level="1"]::after {
    display: none;
}

/* Keep climber over the level path, but don't use the large halo. */
.climber-marker {
    z-index: 55 !important;
    border: 3px solid rgba(255,255,255,.92);
    box-shadow:
        0 9px 18px rgba(60,10,18,.20);
    width: 50px;
    height: 50px;
}

/* Keep the horizontal connectors crisp and centered on each marker. */
.reward-card::after {
    z-index: 46;
    height: 3px;
    background: #9f5e2a;
    box-shadow: 0 1px 2px rgba(69,32,10,.12);
}

@media (max-width: 1100px) {
    .panjat-pinang-base {
        top: 42px;
        height: 1880px;
    }

    .stage {
        min-height: 1960px;
    }

    .reward-slot[data-level="17"] { top: 72px; }
    .reward-slot[data-level="16"] { top: 177px; }
    .reward-slot[data-level="15"] { top: 282px; }
    .reward-slot[data-level="14"] { top: 387px; }
    .reward-slot[data-level="13"] { top: 492px; }
    .reward-slot[data-level="12"] { top: 597px; }
    .reward-slot[data-level="11"] { top: 702px; }
    .reward-slot[data-level="10"] { top: 807px; }
    .reward-slot[data-level="9"]  { top: 912px; }
    .reward-slot[data-level="8"]  { top: 1017px; }
    .reward-slot[data-level="7"]  { top: 1122px; }
    .reward-slot[data-level="6"]  { top: 1227px; }
    .reward-slot[data-level="5"]  { top: 1332px; }
    .reward-slot[data-level="4"]  { top: 1437px; }
    .reward-slot[data-level="3"]  { top: 1542px; }
    .reward-slot[data-level="2"]  { top: 1647px; }
    .reward-slot[data-level="1"]  { top: 1752px; }
}

@media (max-width: 650px) {
    .panjat-pinang-base {
        top: 34px;
        height: 1830px;
    }

    .stage {
        min-height: 1910px;
    }

    .reward-slot::before {
        top: 35px;
        width: 23px;
        height: 23px;
        font-size: 6px;
        box-shadow:
            0 3px 8px rgba(50,23,7,.20),
            0 0 0 3px rgba(255,255,255,.12);
    }

    .reward-slot::after {
        top: 60px;
        width: 2.5px;
        height: 78px;
    }

    .climber-marker {
        width: 44px;
        height: 44px;
        font-size: 18px;
    }
}
</style>


<style>
/* =========================================================
   PANJAT PINANG V5.1 — CLEAN LEVEL PATH + SCROLL BOUNDS
   ========================================================= */

/* The viewport scrolls over exactly the tree's usable canvas. */
.stage-scroll {
    height: 680px !important;
    overflow-y: auto;
    overflow-x: hidden;
    overscroll-behavior: contain;
    -webkit-overflow-scrolling: touch;
}

/* Keep the arena height tied to the tree asset, not to the cards. */
.stage {
    height: 1900px !important;
    min-height: 1900px !important;
}

/* The transparent PNG keeps its natural aspect ratio while being
   given a controlled visual height. It is NOT stretched independently
   in width. */
.panjat-pinang-base {
    top: 0 !important;
    height: 1900px !important;
    width: auto !important;
}

.panjat-pinang-base img {
    width: auto !important;
    height: 100% !important;
    max-width: none !important;
}

/* Hide only the empty placeholder circles. Real occupied markers
   remain available until we replace them with the climber PNG. */
.climber-marker.empty {
    display: none !important;
}

/* Small level marker: keep ONLY the small numbered circle.
   Remove the large translucent halo. */
.reward-slot::before {
    width: 26px !important;
    height: 26px !important;
    top: 34px !important;
    border: 2px solid rgba(255,255,255,.95) !important;
    background: rgba(89,48,18,.92) !important;
    box-shadow:
        0 2px 7px rgba(50,23,7,.28) !important;
}

/* Clear, continuous line between one small level circle and the next. */
.reward-slot::after {
    top: 62px !important;
    left: 50% !important;
    width: 4px !important;
    height: 79px !important;
    transform: translateX(-50%) !important;
    z-index: 46 !important;
    border-radius: 999px !important;
    background: #efb63d !important;
    box-shadow:
        0 0 0 1px rgba(91,48,18,.28),
        0 2px 7px rgba(91,48,18,.18) !important;
}

.reward-slot[data-level="1"]::after {
    display: none !important;
}

/* 17 evenly spaced levels. The first and last markers stay inside
   the tree canvas, while reward cards have just enough room around them. */
.reward-slot { height: 96px !important; }
.reward-slot[data-level="17"] { top: 50px !important; }
.reward-slot[data-level="16"] { top: 158px !important; }
.reward-slot[data-level="15"] { top: 266px !important; }
.reward-slot[data-level="14"] { top: 374px !important; }
.reward-slot[data-level="13"] { top: 482px !important; }
.reward-slot[data-level="12"] { top: 590px !important; }
.reward-slot[data-level="11"] { top: 698px !important; }
.reward-slot[data-level="10"] { top: 806px !important; }
.reward-slot[data-level="9"]  { top: 914px !important; }
.reward-slot[data-level="8"]  { top: 1022px !important; }
.reward-slot[data-level="7"]  { top: 1130px !important; }
.reward-slot[data-level="6"]  { top: 1238px !important; }
.reward-slot[data-level="5"]  { top: 1346px !important; }
.reward-slot[data-level="4"]  { top: 1454px !important; }
.reward-slot[data-level="3"]  { top: 1562px !important; }
.reward-slot[data-level="2"]  { top: 1670px !important; }
.reward-slot[data-level="1"]  { top: 1778px !important; }

/* Keep card connectors aimed at the small marker, not at a halo. */
.reward-card::after {
    z-index: 47 !important;
    height: 3px !important;
    background: #9f5e2a !important;
    box-shadow: 0 1px 2px rgba(69,32,10,.15) !important;
}

/* Mobile keeps the same tree canvas; only the visible window changes. */
@media (max-width: 1100px) {
    .stage {
        height: 1900px !important;
        min-height: 1900px !important;
    }

    .panjat-pinang-base {
        top: 0 !important;
        height: 1900px !important;
    }

    .reward-slot::after {
        width: 4px !important;
        height: 79px !important;
    }
}

@media (max-width: 650px) {
    .stage-scroll {
        height: 640px !important;
    }

    .stage {
        height: 1900px !important;
        min-height: 1900px !important;
    }

    .panjat-pinang-base {
        top: 0 !important;
        height: 1900px !important;
    }

    .reward-slot::before {
        width: 23px !important;
        height: 23px !important;
        top: 35px !important;
        font-size: 6px !important;
        box-shadow: 0 2px 6px rgba(50,23,7,.24) !important;
    }

    .reward-slot::after {
        top: 61px !important;
        width: 3px !important;
        height: 80px !important;
    }
}
</style>


<style id="ui-v8-modern-overrides">
/* =========================================================
   PANJAT PINANG V8 — MODERN TOP UI + REWARD CARDS
   ========================================================= */

/* ---------- MODERN TOP BAR ---------- */
.event-card {
    border-radius: 34px;
    background: rgba(255,252,247,.98);
    box-shadow:
        0 30px 90px rgba(88,24,36,.16),
        0 2px 0 rgba(255,255,255,.9) inset;
}

.event-bar {
    min-height: 74px;
    padding: 16px 22px;
    border-bottom: 1px solid rgba(55,34,21,.07);
    background:
        linear-gradient(180deg, rgba(255,255,255,.98), rgba(255,249,242,.94));
}

.event-bar-title {
    gap: 10px;
    color: #2b2520;
    font-size: 12px;
    letter-spacing: .55px;
}

.event-bar-title::before {
    display: grid;
    place-items: center;
    width: 34px;
    height: 34px;
    border-radius: 11px;
    background: linear-gradient(145deg,#fff2ba,#ffe39a);
    box-shadow: 0 7px 16px rgba(225,167,32,.16);
    font-size: 17px;
}

.live {
    min-height: 34px;
    padding: 0 12px;
    border: 1px solid rgba(215,25,63,.08);
    border-radius: 999px;
    background: #fff0f3;
    font-size: 9px;
    letter-spacing: .8px;
}

.live-dot {
    width: 8px;
    height: 8px;
    box-shadow: 0 0 0 5px rgba(215,25,63,.09);
}

/* ---------- STATUS STRIP ---------- */
.event-status {
    gap: 0;
    padding: 12px;
    background: #f4ede3;
}

.status-box {
    position: relative;
    min-height: 84px;
    padding: 14px 18px;
    border-right: 1px solid rgba(74,44,22,.08);
    background: rgba(255,255,255,.92);
    text-align: left;
    display: flex;
    flex-direction: column;
    justify-content: center;
}

.status-box:first-child { border-radius: 18px 0 0 18px; }
.status-box:last-child {
    border-right: 0;
    border-radius: 0 18px 18px 0;
}

.status-label {
    font-size: 8px;
    letter-spacing: 1px;
    color: #9a8e80;
}

.status-value {
    margin-top: 5px;
    font-size: 27px;
    line-height: 1;
    letter-spacing: -.8px;
}

.status-box::after {
    content: "";
    position: absolute;
    right: 16px;
    top: 50%;
    width: 9px;
    height: 9px;
    transform: translateY(-50%);
    border-radius: 50%;
    background: #ebe4da;
}

.status-box:nth-child(2)::after {
    background: #ffd96c;
    box-shadow: 0 0 0 6px rgba(255,217,108,.16);
}

.status-box:nth-child(3)::after {
    background: #35b968;
    box-shadow: 0 0 0 6px rgba(53,185,104,.13);
}

/* ---------- REWARD CARDS ---------- */
.reward-card {
    width: 238px;
    min-height: 122px;
    padding: 15px 16px 14px;
    border: 1px solid rgba(72,48,30,.08);
    border-radius: 22px;
    background:
        linear-gradient(145deg, rgba(255,255,255,.985), rgba(250,245,237,.97));
    box-shadow:
        0 18px 34px rgba(64,31,12,.11),
        0 2px 0 rgba(255,255,255,.9) inset;
    backdrop-filter: blur(7px);
}

.reward-slot[data-level="17"] .reward-card {
    border-color: rgba(229,174,43,.55);
    background:
        radial-gradient(circle at 86% 0, rgba(255,234,139,.5), transparent 34%),
        linear-gradient(145deg,#fffef4,#fff3cf);
}

.reward-top {
    align-items: center;
    gap: 10px;
}

.reward-level {
    min-width: auto;
    padding: 6px 9px;
    border-radius: 999px;
    background: #efe9df;
    color: #746a5e;
    font-size: 8px;
    letter-spacing: .4px;
}

.reward-slot[data-level="17"] .reward-level {
    background: #f8e5a0;
    color: #765500;
}

.reward-icon {
    width: 42px;
    height: 42px;
    border-radius: 13px;
    background: linear-gradient(145deg,#fff6d6,#ffefba);
    box-shadow: 0 8px 18px rgba(231,181,47,.12);
    font-size: 24px;
}

.reward-name {
    margin-top: 11px;
    color: #342c24;
    font-size: 15px;
    line-height: 1.1;
    letter-spacing: -.2px;
}

.reward-holder {
    margin-top: 9px;
    min-height: 28px;
    padding: 5px 9px;
    background: #f0ebe4;
    color: #84786b;
    font-size: 9px;
    letter-spacing: .1px;
}

.reward-holder.occupied {
    background: #fff0b7;
    color: #795a00;
}

.holder-avatar {
    width: 20px;
    height: 20px;
    flex-basis: 20px;
    font-size: 8px;
}

/* Horizontal connectors: clean white, centered to level marker. */
.reward-card::after {
    width: 88px !important;
    height: 4px !important;
    background: #fff !important;
    box-shadow: 0 0 0 1px rgba(58,37,20,.07);
}

/* ---------- STAGE MARKERS ---------- */
.reward-slot::before {
    top: 35px;
    width: 40px !important;
    height: 40px !important;
    border: 3px solid rgba(255,255,255,.98);
    background: #71421e;
    box-shadow:
        0 0 0 1px rgba(60,32,14,.16),
        0 6px 16px rgba(50,25,8,.18);
    font-size: 10px;
    font-weight: 1000;
}

/* Remove the secondary climber halo when empty; occupied still shows the character marker. */
.climber-marker.empty {
    display: none !important;
}

.climber-marker {
    width: 58px;
    height: 58px;
    border-width: 3px;
    box-shadow: 0 10px 22px rgba(60,10,18,.2);
}

/* Main level line: stronger and clearly visible. */
.reward-stage-line {
    position: absolute;
    top: 54px;
    left: 50%;
    width: 6px;
    transform: translateX(-50%);
    background: #fff;
    box-shadow: 0 0 0 1px rgba(56,32,14,.08);
    border-radius: 999px;
    z-index: 25;
}

/* ---------- MOBILE ---------- */
@media (max-width: 1100px) {
    .event-bar { min-height: 68px; }
    .event-bar-title { font-size: 10px; }
    .status-box { min-height: 76px; padding: 12px 14px; }
    .status-value { font-size: 22px; }
    .reward-card { width: 186px; min-height: 108px; padding: 13px; }
    .reward-name { font-size: 13px; }
    .reward-holder { font-size: 8px; }
    .reward-icon { width: 38px; height: 38px; font-size: 21px; }
    .reward-slot::before { width: 36px !important; height: 36px !important; font-size: 9px; }
    .reward-card::after { width: 58px !important; }
}

@media (max-width: 650px) {
    .event-bar {
        min-height: 60px;
        padding: 10px 12px;
    }

    .event-bar-title {
        font-size: 8px;
        gap: 7px;
    }

    .event-bar-title::before {
        width: 28px;
        height: 28px;
        font-size: 14px;
    }

    .live {
        min-height: 28px;
        padding: 0 9px;
        font-size: 7px;
    }

    .event-status {
        padding: 8px;
    }

    .status-box {
        min-height: 65px;
        padding: 10px 9px;
    }

    .status-box:first-child { border-radius: 13px 0 0 13px; }
    .status-box:last-child { border-radius: 0 13px 13px 0; }

    .status-label { font-size: 6px; }
    .status-value { font-size: 18px; }

    .status-box::after {
        right: 8px;
        width: 7px;
        height: 7px;
    }

    .reward-card {
        width: 150px;
        min-height: 98px;
        padding: 11px;
        border-radius: 17px;
    }

    .reward-level {
        padding: 5px 7px;
        font-size: 7px;
    }

    .reward-icon {
        width: 34px;
        height: 34px;
        border-radius: 10px;
        font-size: 18px;
    }

    .reward-name {
        margin-top: 8px;
        font-size: 11px;
    }

    .reward-holder {
        margin-top: 7px;
        padding: 4px 7px;
        min-height: 24px;
        font-size: 7px;
    }

    .holder-avatar {
        width: 17px;
        height: 17px;
        flex-basis: 17px;
        font-size: 7px;
    }

    .reward-slot::before {
        width: 32px !important;
        height: 32px !important;
        border-width: 2px;
        font-size: 8px;
    }

    .reward-card::after {
        width: 44px !important;
        height: 3px !important;
    }
}
</style>


<style id="ui-v11-final-stage-fix">
/* =========================================================
   PANJAT PINANG V11 — FINAL MOBILE/STAGE FIX
   1) Connector is a sibling layer, so it sits BEHIND cards.
   2) Tree/stage share the same effective height.
   3) Mobile uses a compact, proportional tree scale without
      truncating the bottom of the asset.
   ========================================================= */

/* Connector must never be drawn inside the card. */
.reward-card::after {
    display: none !important;
}

.reward-connector {
    position: absolute;
    top: 47px;
    height: 5px;
    width: 88px;
    background: rgba(255,255,255,.98);
    border-radius: 999px;
    box-shadow: 0 0 0 1px rgba(60,35,18,.12);
    z-index: 22;
    pointer-events: none;
}

/* Level marker stays on top of the connector. */
.reward-slot::before {
    z-index: 70 !important;
    top: 31px !important;
    width: 42px !important;
    height: 42px !important;
    border: 3px solid #fff !important;
    background: #6d3e1f !important;
    box-shadow:
        0 0 0 1px rgba(55,30,12,.18),
        0 5px 12px rgba(45,22,7,.22) !important;
    color: #fff !important;
    font-size: 11px !important;
    line-height: 1 !important;
}

/* Strong main level spine. */
.reward-slot::after {
    z-index: 21 !important;
    top: 69px !important;
    width: 6px !important;
    height: 87px !important;
    background: #fff !important;
    border-radius: 999px !important;
    box-shadow: 0 0 0 1px rgba(55,30,12,.10) !important;
}

/* Connector direction: left cards connect from card edge toward center. */
.reward-slot[data-level="17"] .reward-connector,
.reward-slot[data-level="15"] .reward-connector,
.reward-slot[data-level="13"] .reward-connector,
.reward-slot[data-level="11"] .reward-connector,
.reward-slot[data-level="9"] .reward-connector,
.reward-slot[data-level="7"] .reward-connector,
.reward-slot[data-level="5"] .reward-connector,
.reward-slot[data-level="3"] .reward-connector,
.reward-slot[data-level="1"] .reward-connector {
    left: calc(50% - 350px + 238px);
}

/* Right cards connect from the center toward the card edge. */
.reward-slot[data-level="16"] .reward-connector,
.reward-slot[data-level="14"] .reward-connector,
.reward-slot[data-level="12"] .reward-connector,
.reward-slot[data-level="10"] .reward-connector,
.reward-slot[data-level="8"] .reward-connector,
.reward-slot[data-level="6"] .reward-connector,
.reward-slot[data-level="4"] .reward-connector,
.reward-slot[data-level="2"] .reward-connector {
    right: calc(50% - 350px + 238px);
}

.reward-card,
.climber-marker {
    z-index: 60 !important;
}

/* Desktop: the stage should not create extra dead space below the tree. */
.stage {
    height: 1900px !important;
    min-height: 1900px !important;
    overflow: hidden !important;
}

.panjat-pinang-base {
    top: 0 !important;
    height: 1900px !important;
}

.panjat-pinang-base img {
    height: 100% !important;
    width: auto !important;
}

/* Avoid a second scrollable area. */
.stage-scroll {
    overscroll-behavior: contain !important;
}

@media (max-width: 1100px) {
    .stage-scroll {
        height: 680px !important;
    }

    .stage {
        height: 1900px !important;
        min-height: 1900px !important;
    }

    .panjat-pinang-base {
        height: 1900px !important;
    }

    .panjat-pinang-base img {
        height: 100% !important;
    }

    .reward-card {
        width: 168px !important;
    }

    .reward-slot::before {
        width: 40px !important;
        height: 40px !important;
        top: 32px !important;
        font-size: 10px !important;
    }

    .reward-connector {
        width: 54px;
        top: 47px;
        height: 5px;
    }

    .reward-slot[data-level="17"] .reward-connector,
    .reward-slot[data-level="15"] .reward-connector,
    .reward-slot[data-level="13"] .reward-connector,
    .reward-slot[data-level="11"] .reward-connector,
    .reward-slot[data-level="9"] .reward-connector,
    .reward-slot[data-level="7"] .reward-connector,
    .reward-slot[data-level="5"] .reward-connector,
    .reward-slot[data-level="3"] .reward-connector,
    .reward-slot[data-level="1"] .reward-connector {
        left: calc(50% - 300px + 168px);
    }

    .reward-slot[data-level="16"] .reward-connector,
    .reward-slot[data-level="14"] .reward-connector,
    .reward-slot[data-level="12"] .reward-connector,
    .reward-slot[data-level="10"] .reward-connector,
    .reward-slot[data-level="8"] .reward-connector,
    .reward-slot[data-level="6"] .reward-connector,
    .reward-slot[data-level="4"] .reward-connector,
    .reward-slot[data-level="2"] .reward-connector {
        right: calc(50% - 300px + 168px);
    }
}

@media (max-width: 650px) {
    /* The mobile tree gets slightly more height, but remains uniformly scaled. */
    .stage-scroll {
        height: 640px !important;
    }

    .stage {
        height: 1560px !important;
        min-height: 1560px !important;
        overflow: hidden !important;
    }

    .panjat-pinang-base {
        top: 0 !important;
        left: 50% !important;
        height: 1900px !important;
        transform: translateX(-50%) scale(.81) !important;
        transform-origin: top center !important;
    }

    .panjat-pinang-base img {
        height: 1900px !important;
        width: auto !important;
    }

    /* 17 levels spread over the real mobile tree height. */
    .reward-slot {
        height: 92px !important;
    }

    .reward-slot[data-level="17"] { top: 18px !important; }
    .reward-slot[data-level="16"] { top: 110px !important; }
    .reward-slot[data-level="15"] { top: 202px !important; }
    .reward-slot[data-level="14"] { top: 294px !important; }
    .reward-slot[data-level="13"] { top: 386px !important; }
    .reward-slot[data-level="12"] { top: 478px !important; }
    .reward-slot[data-level="11"] { top: 570px !important; }
    .reward-slot[data-level="10"] { top: 662px !important; }
    .reward-slot[data-level="9"]  { top: 754px !important; }
    .reward-slot[data-level="8"]  { top: 846px !important; }
    .reward-slot[data-level="7"]  { top: 938px !important; }
    .reward-slot[data-level="6"]  { top: 1030px !important; }
    .reward-slot[data-level="5"]  { top: 1122px !important; }
    .reward-slot[data-level="4"]  { top: 1214px !important; }
    .reward-slot[data-level="3"]  { top: 1306px !important; }
    .reward-slot[data-level="2"]  { top: 1398px !important; }
    .reward-slot[data-level="1"]  { top: 1490px !important; }

    .reward-card {
        width: 132px !important;
        min-height: 88px !important;
        padding: 9px !important;
        border-radius: 15px !important;
    }

    .reward-level {
        padding: 4px 6px !important;
        font-size: 6px !important;
    }

    .reward-icon {
        width: 30px !important;
        height: 30px !important;
        border-radius: 9px !important;
        font-size: 16px !important;
    }

    .reward-name {
        margin-top: 6px !important;
        font-size: 9px !important;
    }

    .reward-holder {
        margin-top: 5px !important;
        min-height: 21px !important;
        padding: 3px 6px !important;
        font-size: 6px !important;
    }

    .holder-avatar {
        width: 15px !important;
        height: 15px !important;
        flex-basis: 15px !important;
    }

    .reward-slot::before {
        top: 31px !important;
        width: 38px !important;
        height: 38px !important;
        font-size: 10px !important;
    }

    .reward-slot::after {
        top: 68px !important;
        width: 5px !important;
        height: 93px !important;
    }

    .reward-connector {
        top: 46px !important;
        width: 28px !important;
        height: 5px !important;
        z-index: 22 !important;
    }

    .reward-slot[data-level="17"] .reward-connector,
    .reward-slot[data-level="15"] .reward-connector,
    .reward-slot[data-level="13"] .reward-connector,
    .reward-slot[data-level="11"] .reward-connector,
    .reward-slot[data-level="9"] .reward-connector,
    .reward-slot[data-level="7"] .reward-connector,
    .reward-slot[data-level="5"] .reward-connector,
    .reward-slot[data-level="3"] .reward-connector,
    .reward-slot[data-level="1"] .reward-connector {
        left: calc(50% - 3px - 28px);
    }

    .reward-slot[data-level="16"] .reward-connector,
    .reward-slot[data-level="14"] .reward-connector,
    .reward-slot[data-level="12"] .reward-connector,
    .reward-slot[data-level="10"] .reward-connector,
    .reward-slot[data-level="8"] .reward-connector,
    .reward-slot[data-level="6"] .reward-connector,
    .reward-slot[data-level="4"] .reward-connector,
    .reward-slot[data-level="2"] .reward-connector {
        right: calc(50% - 3px - 28px);
    }
}
</style>


<style id="ui-v12-final-correction">
/* =========================================================
   PANJAT PINANG V12 — FINAL MOBILE CORRECTION
   - One level marker only: numbered dot for empty levels.
   - Active holder marker replaces the dot.
   - Card connector is a separate sibling behind the card.
   - No connector pseudo-element on cards.
   - Tree/stage heights are aligned so the bottom of the tree
     remains inside the scrollable stage.
   ========================================================= */

/* Never draw any connector from the card itself. */
.reward-card::before,
.reward-card::after {
    display: none !important;
    content: none !important;
}

/* One real connector element, placed behind the card. */
.reward-connector {
    position: absolute !important;
    top: 52px !important;
    height: 5px !important;
    background: #fff !important;
    border-radius: 999px !important;
    box-shadow: 0 0 0 1px rgba(60,35,18,.10), 0 0 7px rgba(255,255,255,.25) !important;
    z-index: 20 !important;
    pointer-events: none !important;
}

/* The numbered dot is the single level marker for empty slots. */
.reward-slot .climber-marker.empty {
    display: none !important;
}

.reward-slot::before {
    top: 34px !important;
    left: 50% !important;
    width: 48px !important;
    height: 48px !important;
    transform: translateX(-50%) !important;
    z-index: 80 !important;
    border: 3px solid #fff !important;
    border-radius: 50% !important;
    background: rgba(91,52,27,.97) !important;
    color: #fff !important;
    font-size: 12px !important;
    font-weight: 1000 !important;
    line-height: 1 !important;
    box-shadow: 0 4px 12px rgba(44,22,8,.20) !important;
}

/* Active holder replaces the numbered dot visually. */
.reward-slot .climber-marker:not(.empty) {
    top: 27px !important;
    left: 50% !important;
    width: 62px !important;
    height: 62px !important;
    transform: translateX(-50%) !important;
    z-index: 85 !important;
    border: 3px solid #fff !important;
    box-shadow: 0 8px 18px rgba(60,10,18,.20) !important;
}

/* Vertical spine. Slot spacing is 105px on desktop/tablet. */
.reward-slot::after {
    content: "" !important;
    position: absolute !important;
    top: 58px !important;
    left: 50% !important;
    width: 6px !important;
    height: 105px !important;
    transform: translateX(-50%) !important;
    z-index: 18 !important;
    background: #fff !important;
    border-radius: 999px !important;
    box-shadow: 0 0 0 1px rgba(60,35,18,.10) !important;
}

.reward-slot[data-level="1"]::after {
    display: none !important;
}

/* Desktop: connector reaches from the card edge to the level dot. */
@media (min-width: 1101px) {
    .reward-slot[data-level="17"] .reward-connector,
    .reward-slot[data-level="15"] .reward-connector,
    .reward-slot[data-level="13"] .reward-connector,
    .reward-slot[data-level="11"] .reward-connector,
    .reward-slot[data-level="9"] .reward-connector,
    .reward-slot[data-level="7"] .reward-connector,
    .reward-slot[data-level="5"] .reward-connector,
    .reward-slot[data-level="3"] .reward-connector,
    .reward-slot[data-level="1"] .reward-connector {
        left: calc(50% - 350px + 205px) !important;
        width: 145px !important;
    }

    .reward-slot[data-level="16"] .reward-connector,
    .reward-slot[data-level="14"] .reward-connector,
    .reward-slot[data-level="12"] .reward-connector,
    .reward-slot[data-level="10"] .reward-connector,
    .reward-slot[data-level="8"] .reward-connector,
    .reward-slot[data-level="6"] .reward-connector,
    .reward-slot[data-level="4"] .reward-connector,
    .reward-slot[data-level="2"] .reward-connector {
        right: calc(50% - 350px + 205px) !important;
        width: 145px !important;
    }
}

/* Tablet / narrow desktop */
@media (max-width: 1100px) {
    .reward-slot::before {
        top: 36px !important;
        width: 44px !important;
        height: 44px !important;
        font-size: 11px !important;
    }

    .reward-slot .climber-marker:not(.empty) {
        top: 29px !important;
        width: 56px !important;
        height: 56px !important;
    }

    .reward-slot::after {
        top: 57px !important;
        width: 5px !important;
        height: 105px !important;
    }

    .reward-slot[data-level="17"] .reward-connector,
    .reward-slot[data-level="15"] .reward-connector,
    .reward-slot[data-level="13"] .reward-connector,
    .reward-slot[data-level="11"] .reward-connector,
    .reward-slot[data-level="9"] .reward-connector,
    .reward-slot[data-level="7"] .reward-connector,
    .reward-slot[data-level="5"] .reward-connector,
    .reward-slot[data-level="3"] .reward-connector,
    .reward-slot[data-level="1"] .reward-connector {
        left: calc(10% + 118px) !important;
        width: calc(40% - 118px) !important;
    }

    .reward-slot[data-level="16"] .reward-connector,
    .reward-slot[data-level="14"] .reward-connector,
    .reward-slot[data-level="12"] .reward-connector,
    .reward-slot[data-level="10"] .reward-connector,
    .reward-slot[data-level="8"] .reward-connector,
    .reward-slot[data-level="6"] .reward-connector,
    .reward-slot[data-level="4"] .reward-connector,
    .reward-slot[data-level="2"] .reward-connector {
        right: calc(10% + 118px) !important;
        width: calc(40% - 118px) !important;
    }
}

/* Mobile: compact, clean, no line through cards. */
@media (max-width: 650px) {
    .stage-wrap {
        overflow: hidden !important;
    }

    .stage-scroll {
        height: 680px !important;
        overflow-x: hidden !important;
        overflow-y: auto !important;
    }

    /* The stage is tall enough to contain the entire visual tree. */
    .stage,
    .stage-scroll .stage {
        height: 1500px !important;
        min-height: 1500px !important;
        overflow: hidden !important;
    }

    /* Keep the tree proportionally sized; never stretch width/height independently. */
    .panjat-pinang-base {
        top: 0 !important;
        left: 50% !important;
        width: 330px !important;
        height: auto !important;
        transform: translateX(-50%) !important;
        transform-origin: top center !important;
    }

    .panjat-pinang-base img {
        width: 100% !important;
        height: auto !important;
        max-width: 100% !important;
    }

    /* 17 levels every 88px. */
    .reward-slot {
        height: 88px !important;
    }

    .reward-slot[data-level="17"] { top: 18px !important; }
    .reward-slot[data-level="16"] { top: 106px !important; }
    .reward-slot[data-level="15"] { top: 194px !important; }
    .reward-slot[data-level="14"] { top: 282px !important; }
    .reward-slot[data-level="13"] { top: 370px !important; }
    .reward-slot[data-level="12"] { top: 458px !important; }
    .reward-slot[data-level="11"] { top: 546px !important; }
    .reward-slot[data-level="10"] { top: 634px !important; }
    .reward-slot[data-level="9"]  { top: 722px !important; }
    .reward-slot[data-level="8"]  { top: 810px !important; }
    .reward-slot[data-level="7"]  { top: 898px !important; }
    .reward-slot[data-level="6"]  { top: 986px !important; }
    .reward-slot[data-level="5"]  { top: 1074px !important; }
    .reward-slot[data-level="4"]  { top: 1162px !important; }
    .reward-slot[data-level="3"]  { top: 1250px !important; }
    .reward-slot[data-level="2"]  { top: 1338px !important; }
    .reward-slot[data-level="1"]  { top: 1426px !important; }

    .reward-slot::before {
        top: 32px !important;
        width: 46px !important;
        height: 46px !important;
        border-width: 3px !important;
        font-size: 11px !important;
        z-index: 80 !important;
    }

    .reward-slot .climber-marker:not(.empty) {
        top: 25px !important;
        width: 56px !important;
        height: 56px !important;
        z-index: 85 !important;
    }

    .reward-slot::after {
        top: 56px !important;
        width: 5px !important;
        height: 88px !important;
        z-index: 18 !important;
    }

    /* Small cards; never let connectors sit on top of the card. */
    .reward-card {
        width: 128px !important;
        min-height: 76px !important;
        padding: 9px 10px !important;
        border-radius: 15px !important;
        position: absolute !important;
        z-index: 60 !important;
        background: rgba(255,255,255,.97) !important;
    }

    .reward-slot[data-level="17"] .reward-card,
    .reward-slot[data-level="15"] .reward-card,
    .reward-slot[data-level="13"] .reward-card,
    .reward-slot[data-level="11"] .reward-card,
    .reward-slot[data-level="9"] .reward-card,
    .reward-slot[data-level="7"] .reward-card,
    .reward-slot[data-level="5"] .reward-card,
    .reward-slot[data-level="3"] .reward-card,
    .reward-slot[data-level="1"] .reward-card {
        left: 8px !important;
        right: auto !important;
    }

    .reward-slot[data-level="16"] .reward-card,
    .reward-slot[data-level="14"] .reward-card,
    .reward-slot[data-level="12"] .reward-card,
    .reward-slot[data-level="10"] .reward-card,
    .reward-slot[data-level="8"] .reward-card,
    .reward-slot[data-level="6"] .reward-card,
    .reward-slot[data-level="4"] .reward-card,
    .reward-slot[data-level="2"] .reward-card {
        right: 8px !important;
        left: auto !important;
    }

    /* Connector stops exactly at card edge and is BEHIND the card. */
    .reward-connector {
        top: 53px !important;
        height: 4px !important;
        z-index: 20 !important;
    }

    .reward-slot[data-level="17"] .reward-connector,
    .reward-slot[data-level="15"] .reward-connector,
    .reward-slot[data-level="13"] .reward-connector,
    .reward-slot[data-level="11"] .reward-connector,
    .reward-slot[data-level="9"] .reward-connector,
    .reward-slot[data-level="7"] .reward-connector,
    .reward-slot[data-level="5"] .reward-connector,
    .reward-slot[data-level="3"] .reward-connector,
    .reward-slot[data-level="1"] .reward-connector {
        left: 136px !important;
        right: auto !important;
        width: calc(50% - 136px) !important;
    }

    .reward-slot[data-level="16"] .reward-connector,
    .reward-slot[data-level="14"] .reward-connector,
    .reward-slot[data-level="12"] .reward-connector,
    .reward-slot[data-level="10"] .reward-connector,
    .reward-slot[data-level="8"] .reward-connector,
    .reward-slot[data-level="6"] .reward-connector,
    .reward-slot[data-level="4"] .reward-connector,
    .reward-slot[data-level="2"] .reward-connector {
        right: 136px !important;
        left: auto !important;
        width: calc(50% - 136px) !important;
    }

    .reward-level {
        padding: 4px 6px !important;
        font-size: 7px !important;
    }

    .reward-icon {
        width: 30px !important;
        height: 30px !important;
        font-size: 17px !important;
    }

    .reward-name {
        margin-top: 5px !important;
        font-size: 10px !important;
        line-height: 1.1 !important;
    }

    .reward-holder {
        margin-top: 5px !important;
        padding: 4px 6px !important;
        font-size: 6px !important;
    }
}
</style>

<style id="ui-v13-layout-cleanup">
/* =========================================================
   PANJAT PINANG V13 — CLEAN STAGE / NO CLIPPED CARDS
   - All 17 levels fit inside the natural tree height.
   - No level card is clipped at the stage bottom.
   - Mobile uses a compact rhythm without squeezing cards.
   - Tree keeps aspect ratio.
   ========================================================= */

/* Stop older stage sizing rules from fighting each other. */
.stage {
    height: 1900px !important;
    min-height: 1900px !important;
    overflow: hidden !important;
}

.stage-scroll {
    overflow-x: hidden !important;
    overscroll-behavior: contain !important;
}

.panjat-pinang-base {
    top: 0 !important;
    left: 50% !important;
    width: auto !important;
    height: 1900px !important;
    transform: translateX(-50%) !important;
    transform-origin: top center !important;
}

.panjat-pinang-base img {
    display: block !important;
    width: auto !important;
    height: 1900px !important;
    max-width: none !important;
}

/* Natural 108px rhythm from Level 17 to Level 1. */
.reward-slot[data-level="17"] { top: 48px !important; }
.reward-slot[data-level="16"] { top: 156px !important; }
.reward-slot[data-level="15"] { top: 264px !important; }
.reward-slot[data-level="14"] { top: 372px !important; }
.reward-slot[data-level="13"] { top: 480px !important; }
.reward-slot[data-level="12"] { top: 588px !important; }
.reward-slot[data-level="11"] { top: 696px !important; }
.reward-slot[data-level="10"] { top: 804px !important; }
.reward-slot[data-level="9"]  { top: 912px !important; }
.reward-slot[data-level="8"]  { top: 1020px !important; }
.reward-slot[data-level="7"]  { top: 1128px !important; }
.reward-slot[data-level="6"]  { top: 1236px !important; }
.reward-slot[data-level="5"]  { top: 1344px !important; }
.reward-slot[data-level="4"]  { top: 1452px !important; }
.reward-slot[data-level="3"]  { top: 1560px !important; }
.reward-slot[data-level="2"]  { top: 1668px !important; }
.reward-slot[data-level="1"]  { top: 1776px !important; }

/* Keep the center spine aligned to the middle of each dot. */
.reward-slot::after {
    top: 58px !important;
    height: 110px !important;
}

.reward-slot[data-level="1"]::after {
    display: none !important;
}

/* Cards sit a little tighter to the level dots. */
.reward-card {
    min-height: 94px !important;
}

/* Connector is always below the card and centered to the dot. */
.reward-connector {
    top: 45px !important;
    height: 5px !important;
    z-index: 20 !important;
}

@media (max-width: 1100px) {
    .stage-scroll {
        height: 680px !important;
    }

    .stage {
        height: 1900px !important;
        min-height: 1900px !important;
    }

    .panjat-pinang-base {
        height: 1900px !important;
        transform: translateX(-50%) !important;
    }

    .panjat-pinang-base img {
        height: 1900px !important;
    }

    .reward-card {
        width: 168px !important;
        min-height: 90px !important;
    }

    .reward-slot::before {
        width: 44px !important;
        height: 44px !important;
        top: 33px !important;
        font-size: 11px !important;
    }

    .reward-slot .climber-marker:not(.empty) {
        width: 56px !important;
        height: 56px !important;
        top: 27px !important;
    }

    .reward-slot::after {
        top: 56px !important;
        height: 110px !important;
        width: 5px !important;
    }
}

@media (max-width: 650px) {
    .stage-scroll {
        height: 680px !important;
    }

    .stage,
    .stage-scroll .stage {
        height: 1500px !important;
        min-height: 1500px !important;
        overflow: hidden !important;
    }

    .panjat-pinang-base {
        top: 0 !important;
        left: 50% !important;
        width: 300px !important;
        height: auto !important;
        transform: translateX(-50%) !important;
    }

    .panjat-pinang-base img {
        width: 300px !important;
        height: auto !important;
        max-width: none !important;
    }

    /* Compact mobile rhythm; enough room for the card itself. */
    .reward-slot[data-level="17"] { top: 28px !important; }
    .reward-slot[data-level="16"] { top: 116px !important; }
    .reward-slot[data-level="15"] { top: 204px !important; }
    .reward-slot[data-level="14"] { top: 292px !important; }
    .reward-slot[data-level="13"] { top: 380px !important; }
    .reward-slot[data-level="12"] { top: 468px !important; }
    .reward-slot[data-level="11"] { top: 556px !important; }
    .reward-slot[data-level="10"] { top: 644px !important; }
    .reward-slot[data-level="9"]  { top: 732px !important; }
    .reward-slot[data-level="8"]  { top: 820px !important; }
    .reward-slot[data-level="7"]  { top: 908px !important; }
    .reward-slot[data-level="6"]  { top: 996px !important; }
    .reward-slot[data-level="5"]  { top: 1084px !important; }
    .reward-slot[data-level="4"]  { top: 1172px !important; }
    .reward-slot[data-level="3"]  { top: 1260px !important; }
    .reward-slot[data-level="2"]  { top: 1348px !important; }
    .reward-slot[data-level="1"]  { top: 1436px !important; }

    .reward-slot {
        height: 80px !important;
    }

    .reward-card {
        width: 122px !important;
        min-height: 74px !important;
        padding: 8px 9px !important;
        border-radius: 14px !important;
    }

    .reward-level {
        font-size: 6px !important;
    }

    .reward-name {
        margin-top: 4px !important;
        font-size: 9px !important;
    }

    .reward-holder {
        margin-top: 4px !important;
        font-size: 6px !important;
    }

    .reward-icon {
        width: 28px !important;
        height: 28px !important;
        font-size: 15px !important;
    }

    .holder-avatar {
        width: 14px !important;
        height: 14px !important;
        flex-basis: 14px !important;
    }

    .reward-slot::before {
        top: 25px !important;
        width: 44px !important;
        height: 44px !important;
        border-width: 3px !important;
        font-size: 10px !important;
        z-index: 80 !important;
    }

    .reward-slot .climber-marker:not(.empty) {
        top: 18px !important;
        width: 52px !important;
        height: 52px !important;
    }

    .reward-slot::after {
        top: 47px !important;
        height: 89px !important;
        width: 5px !important;
    }

    .reward-connector {
        top: 41px !important;
        width: 24px !important;
        height: 4px !important;
    }

    .reward-slot[data-level="17"] .reward-connector,
    .reward-slot[data-level="15"] .reward-connector,
    .reward-slot[data-level="13"] .reward-connector,
    .reward-slot[data-level="11"] .reward-connector,
    .reward-slot[data-level="9"] .reward-connector,
    .reward-slot[data-level="7"] .reward-connector,
    .reward-slot[data-level="5"] .reward-connector,
    .reward-slot[data-level="3"] .reward-connector,
    .reward-slot[data-level="1"] .reward-connector {
        left: 130px !important;
        right: auto !important;
        width: calc(50% - 130px) !important;
    }

    .reward-slot[data-level="16"] .reward-connector,
    .reward-slot[data-level="14"] .reward-connector,
    .reward-slot[data-level="12"] .reward-connector,
    .reward-slot[data-level="10"] .reward-connector,
    .reward-slot[data-level="8"] .reward-connector,
    .reward-slot[data-level="6"] .reward-connector,
    .reward-slot[data-level="4"] .reward-connector,
    .reward-slot[data-level="2"] .reward-connector {
        right: 130px !important;
        left: auto !important;
        width: calc(50% - 130px) !important;
    }

    /* Make sure the final card is fully visible above the stage edge. */
    .stage-scroll .stage {
        padding-bottom: 30px !important;
    }
}
</style>
</head>


<body>


<main class="page">


    <!-- =====================================================
         HEADER
    ====================================================== -->

    <header class="header">


        <div class="brand">

            <img
                src="{{ asset('images/drop-play-white.png') }}"
                alt="Drop Play"
                class="brand-logo"
            >


            <div class="brand-label">
                🇮🇩 EVENT KEMERDEKAAN 2026
            </div>

        </div>


        <div class="countdown">


            <div
                class="countdown-label"
                id="countdownCaption"
            >
                EVENT<br>
                BERAKHIR DALAM
            </div>


            <div class="timer">


                <div class="timer-box">

                    <div
                        class="timer-number"
                        id="hours"
                    >
                        00
                    </div>

                    <div class="timer-label">
                        JAM
                    </div>

                </div>


                <div class="timer-box">

                    <div
                        class="timer-number"
                        id="minutes"
                    >
                        00
                    </div>

                    <div class="timer-label">
                        MENIT
                    </div>

                </div>


                <div class="timer-box">

                    <div
                        class="timer-number"
                        id="seconds"
                    >
                        00
                    </div>

                    <div class="timer-label">
                        DETIK
                    </div>

                </div>


            </div>


        </div>


    </header>


    <!-- =====================================================
         HERO
    ====================================================== -->

    <section class="hero">


        <div class="hero-badge">
            🇮🇩 REBUTAN HADIAH KEMERDEKAAN
        </div>


        <h1 class="hero-title">

            PANJAT

            <span>
                PINANG
            </span>

        </h1>


        <p class="hero-description">

            Setiap peserta punya perjalanan sendiri.
            Naikkan spending kamu, capai level yang lebih tinggi,
            dan rebut posisi hadiah sebelum waktu berakhir.

        </p>


    </section>


    <!-- =====================================================
         EVENT CARD
    ====================================================== -->

    <section class="event-card">



        </div>


        <!-- =================================================
             STATUS
        ================================================== -->

        <div class="event-status">


            <div class="status-box">

                <div class="status-label">
                    TOTAL HADIAH
                </div>


                <div
                    class="status-value"
                    id="rewardCount"
                >
                    17
                </div>

            </div>


            <div class="status-box">

                <div class="status-label">
                    POSISI TERISI
                </div>


                <div
                    class="status-value red"
                    id="occupiedCount"
                >
                    0
                </div>

            </div>


            <div class="status-box">

                <div class="status-label">
                    STATUS EVENT
                </div>


                <div
                    class="status-value"
                    id="eventStatus"
                >
                    LIVE
                </div>

            </div>


        </div>


        <!-- =================================================
             SCROLLABLE PANJAT PINANG
        ================================================== -->

        <div class="stage-wrap">


            <div class="stage-scroll" id="stageScroll">


                <div class="stage">


                    <div class="stage-heading">
                        SCROLL UNTUK MELIHAT SEMUA LEVEL
                    </div>


                    <!-- =================================================
                         POLE
                    ================================================== -->

                    <div class="panjat-pinang-base" aria-hidden="true">
                        <img
                            src="{{ asset('images/event/panjat-pinang-base.webp') }}"
                            alt=""
                        >
                    </div>


                    <!-- =================================================
                         LEVEL CONTAINER
                    ================================================== -->

                    <div
                        id="rewardStage"
                    ></div>


                    <div class="stage-bottom"></div>


                    <div class="scroll-tip">
                        ↓ SCROLL
                    </div>


                </div>


            </div>


        </div>


    </section>


    <!-- =====================================================
         LEADERBOARD
    ====================================================== -->

    <section class="leaderboard">


        <div class="leader-head">


            <div class="leader-title">


                <div class="leader-icon">
                    🏆
                </div>


                <div class="leader-heading">

                    <h2>
                        Top Spender
                    </h2>


                    <p>
                        Posisi sementara peserta
                    </p>

                </div>


            </div>


            <div class="leader-live">
                LIVE RANKING
            </div>


        </div>


        <div
            class="top-three"
            id="topThree"
        >

            <div class="empty-ranking">
                Memuat leaderboard...
            </div>

        </div>


        <div
            class="other-ranks"
            id="otherRanks"
        ></div>


    </section>


    <footer class="footer">

        🇮🇩 DIRGAHAYU REPUBLIK INDONESIA
        &nbsp;•&nbsp;
        DROP PLAY

    </footer>


</main>


<!-- =========================================================
     JAVASCRIPT
========================================================= -->

<script>

    let remainingSeconds = 0;

    let eventFinished = false;


    /* =========================================================
       ICON HADIAH SEMENTARA
    ========================================================== */

    function getRewardIcon(
        level
    ) {

        const icons = {

            17: '🏆',
            16: '📱',
            15: '⌚',
            14: '🎧',
            13: '🎁',
            12: '🎮',
            11: '💻',
            10: '📷',
            9: '👟',
            8: '🎒',
            7: '🎁',
            6: '🎁',
            5: '🎁',
            4: '🎁',
            3: '🎁',
            2: '🎁',
            1: '🎁'

        };


        return icons[level] || '🎁';

    }


    /* =========================================================
       ESCAPE HTML
    ========================================================== */

    function escapeHtml(
        value
    ) {

        return String(value)

            .replace(
                /&/g,
                '&amp;'
            )

            .replace(
                /</g,
                '&lt;'
            )

            .replace(
                />/g,
                '&gt;'
            )

            .replace(
                /"/g,
                '&quot;'
            )

            .replace(
                /'/g,
                '&#039;'
            );

    }


    /* =========================================================
       COUNTDOWN
    ========================================================== */

    function renderCountdown()
    {

        const total =
            Math.max(
                0,
                Math.floor(
                    remainingSeconds
                )
            );


        const hours =
            Math.floor(
                total / 3600
            );


        const minutes =
            Math.floor(
                (total % 3600) / 60
            );


        const seconds =
            total % 60;


        document
            .getElementById(
                'hours'
            )
            .innerText =
            String(hours)
                .padStart(2, '0');


        document
            .getElementById(
                'minutes'
            )
            .innerText =
            String(minutes)
                .padStart(2, '0');


        document
            .getElementById(
                'seconds'
            )
            .innerText =
            String(seconds)
                .padStart(2, '0');


        if (
            total <= 0
        ) {

            document
                .getElementById(
                    'countdownCaption'
                )
                .innerHTML =
                'EVENT<br>SELESAI';

        }

    }


    /* =========================================================
       REWARD STAGE
    ========================================================== */

    function renderRewards(
        rewards
    )
    {

        const container =
            document.getElementById(
                'rewardStage'
            );


        if (!container) {
            return;
        }


        container.innerHTML = '';


        if (
            !Array.isArray(rewards)
            ||
            rewards.length === 0
        ) {

            return;

        }


        /*
        ---------------------------------------------------------
        Sort:
        level 17 → 1
        ---------------------------------------------------------
        */

        const sorted =
            [...rewards]
                .sort(
                    (a, b) =>
                        Number(b.level)
                        -
                        Number(a.level)
                );


        /*
        ---------------------------------------------------------
        Create 17 cards
        ---------------------------------------------------------
        */

        sorted.forEach(
            reward => {

                const level =
                    Number(
                        reward.level
                    );


                const occupied =
                    Boolean(
                        reward.occupied
                    );


                const holder =
                    reward.holder
                        ? String(
                            reward.holder
                        )
                        : null;
                const avatar =
                reward.avatar
                    ? String(reward.avatar)
                    : null;

                const initial =
                    holder
                        ? holder
                            .trim()
                            .charAt(0)
                            .toUpperCase()
                        : '';


                const slot =
                    document.createElement(
                        'div'
                    );


                slot.className =
                    'reward-slot';


                slot.dataset.level =
                    level;


                slot.innerHTML = `

                    <div class="reward-connector" aria-hidden="true"></div>

                    <div class="reward-card">

                        <div class="reward-top">

                            <span class="reward-level">
                                LEVEL ${level}
                            </span>

                            <div class="reward-icon">
                                ${getRewardIcon(level)}
                            </div>

                        </div>


                        <div class="reward-name">

                            ${escapeHtml(
                                reward.name
                            )}

                        </div>


                        <div
                            class="
                                reward-holder
                                ${occupied ? 'occupied' : ''}
                            "
                        >

                            <span class="holder-avatar">
    ${
        avatar
            ? `
                <img
                    src="${escapeHtml(avatar)}"
                    alt=""
                >
            `
            : escapeHtml(initial)
    }
</span>


                            <span>

                                ${
                                    holder
                                        ? escapeHtml(holder)
                                        : 'BELUM TERISI'
                                }

                            </span>

                        </div>


                    </div>


                    <div
    class="
        climber-marker
        ${occupied ? '' : 'empty'}
    "
>
    ${
        occupied
            ? (
                avatar
                    ? `
                        <img
                            src="${escapeHtml(avatar)}"
                            alt=""
                        >
                    `
                    : 'U'
            )
            : ''
    }
</div>
                `;


                container.appendChild(
                    slot
                );

            }
        );

    }


    /* =========================================================
       STATUS
    ========================================================== */

    function renderStatus(
        rewards,
        event
    )
    {

        const occupiedCount =
            Array.isArray(rewards)
                ? rewards.filter(
                    reward =>
                        reward.occupied
                ).length
                : 0;


        document
            .getElementById(
                'rewardCount'
            )
            .innerText =
            Array.isArray(rewards)
                ? rewards.length
                : 0;


        document
            .getElementById(
                'occupiedCount'
            )
            .innerText =
            occupiedCount;


        const eventStatus =
            document.getElementById(
                'eventStatus'
            );


        if (
            event.finished
        ) {

            eventStatus.innerText =
                'SELESAI';

            eventStatus.classList.add(
                'red'
            );

        }
        else {

            eventStatus.innerText =
                'LIVE';

            eventStatus.classList.remove(
                'red'
            );

        }

    }


    /* =========================================================
       LEADERBOARD
    ========================================================== */
function getLeaderboardSignature(leaderboard)
{
    if (!Array.isArray(leaderboard)) {
        return '[]';
    }

    return leaderboard
        .slice(0, 5)
        .map(person =>
            `${person.rank}:${person.name}:${person.avatar || ''}`
        )
        .join('|');
}

    let lastLeaderboardSignature = null;

    function renderLeaderboard(leaderboard)
    {
        const topThree =
            document.getElementById('topThree');

        const otherRanks =
            document.getElementById('otherRanks');

        if (!topThree || !otherRanks) {
            return;
        }

        const signature =
            getLeaderboardSignature(leaderboard);

        /*
        Jangan rebuild DOM kalau data leaderboard
        belum berubah. Ini yang menghilangkan kedip
        setiap polling API.
        */
        if (
            signature === lastLeaderboardSignature
        ) {
            return;
        }

        lastLeaderboardSignature =
            signature;

        topThree.innerHTML = '';
        otherRanks.innerHTML = '';

        if (
            !Array.isArray(leaderboard)
            ||
            leaderboard.length === 0
        ) {
            topThree.innerHTML = `
                <div class="empty-ranking">
                    Belum ada peserta.
                    <br>
                    Menunggu perjuangan pertama 🇮🇩
                </div>
            `;

            return;
        }

        const top3 =
            leaderboard.slice(0, 3);

        const medals = [
            '🥇',
            '🥈',
            '🥉'
        ];

        /*
        Visual podium:
        #2 | #1 | #3
        */
        const order = [
            1,
            0,
            2
        ];

        order.forEach(index => {

            if (index >= top3.length) {
                return;
            }

            const person =
                top3[index];

            const podium =
                document.createElement('div');

            podium.className = 'podium';

            if (person.rank === 1) {
                podium.classList.add('first');
            }

            const initial =
    String(person.name)
        .trim()
        .charAt(0)
        .toUpperCase();

const avatarHtml =
    person.avatar
        ? `
            <img
                src="${escapeHtml(person.avatar)}"
                alt="${escapeHtml(person.name)}"
            >
        `
        : escapeHtml(initial);

podium.innerHTML = `
    <div class="medal">
        ${medals[index]}
    </div>

    <div class="podium-avatar">
        ${avatarHtml}
    </div>

    <div class="podium-name">
        ${escapeHtml(person.name)}
    </div>

    <div class="podium-rank">
        RANK #${person.rank}
    </div>
`;

            topThree.appendChild(podium);
        });

        leaderboard
            .slice(3, 5)
            .forEach(person => {

                const item =
                    document.createElement('div');

                item.className =
                    'rank';

                const initial =
    String(person.name)
        .trim()
        .charAt(0)
        .toUpperCase();

const avatarHtml =
    person.avatar
        ? `
            <img
                src="${escapeHtml(person.avatar)}"
                alt="${escapeHtml(person.name)}"
            >
        `
        : escapeHtml(initial);

item.innerHTML = `
    <span class="rank-number">
        #${person.rank}
    </span>

    <div class="rank-avatar">
        ${avatarHtml}
    </div>

    <div class="rank-name">
        ${escapeHtml(person.name)}
    </div>
`;

                otherRanks.appendChild(item);
            });
    }

    /* =========================================================
       LOAD EVENT
    ========================================================== */

    async function loadEvent()
    {

        try {

            const response =
                await fetch(
                    '/api/event?_=' +
                    Date.now(),
                    {
                        method:
                            'GET',

                        headers:
                        {
                            'Accept':
                                'application/json'
                        },

                        cache:
                            'no-store'
                    }
                );


            if (
                !response.ok
            ) {

                throw new Error(
                    'API error ' +
                    response.status
                );

            }


            const data =
                await response.json();


            if (
                !data.success
            ) {

                throw new Error(
                    data.message ||
                    'Event tidak tersedia'
                );

            }


            /*
            -----------------------------------------------------
            EVENT
            -----------------------------------------------------
            */

            remainingSeconds =
                Number(
                    data.event
                        .remaining_seconds
                ) || 0;


            eventFinished =
                Boolean(
                    data.event
                        .finished
                );


            renderCountdown();


            /*
            -----------------------------------------------------
            REWARDS
            -----------------------------------------------------
            */

            renderRewards(
                data.rewards
            );


            renderStatus(
                data.rewards,
                data.event
            );


            /*
            -----------------------------------------------------
            LEADERBOARD
            -----------------------------------------------------
            */

            renderLeaderboard(
                data.leaderboard
            );

        }
        catch (error) {

            console.error(
                'Gagal mengambil event:',
                error
            );

        }

    }


    /* =========================================================
       START
    ========================================================== */

    loadEvent();


    /*
    Refresh API setiap 2 detik.
    */

    setInterval(
        loadEvent,
        2000
    );


    /*
    Countdown lokal setiap 1 detik.
    */

    setInterval(
        () => {

            if (
                remainingSeconds > 0
                &&
                !eventFinished
            ) {

                remainingSeconds--;

            }


            renderCountdown();

        },
        1000
    );

</script>





<style id="ui-v10-mobile-final">
/* =========================================================
   PANJAT PINANG V10 — MOBILE CONNECTOR FINAL FIX
   Prevent connectors from crossing reward text and keep the
   horizontal line centered on each level.
   ========================================================= */

.reward-card {
    overflow: visible !important;
}

.reward-card::after {
    top: 50% !important;
    transform: translateY(-50%) !important;
    z-index: 1 !important;
}

.reward-card > * {
    position: relative !important;
    z-index: 3 !important;
}

@media (max-width: 650px) {
    /* More breathing room so one card cannot visually collide with the next level. */
    .reward-slot {
        height: 88px !important;
    }

    .reward-slot[data-level="17"] { top: 18px !important; }
    .reward-slot[data-level="16"] { top: 106px !important; }
    .reward-slot[data-level="15"] { top: 194px !important; }
    .reward-slot[data-level="14"] { top: 282px !important; }
    .reward-slot[data-level="13"] { top: 370px !important; }
    .reward-slot[data-level="12"] { top: 458px !important; }
    .reward-slot[data-level="11"] { top: 546px !important; }
    .reward-slot[data-level="10"] { top: 634px !important; }
    .reward-slot[data-level="9"]  { top: 722px !important; }
    .reward-slot[data-level="8"]  { top: 810px !important; }
    .reward-slot[data-level="7"]  { top: 898px !important; }
    .reward-slot[data-level="6"]  { top: 986px !important; }
    .reward-slot[data-level="5"]  { top: 1074px !important; }
    .reward-slot[data-level="4"]  { top: 1162px !important; }
    .reward-slot[data-level="3"]  { top: 1250px !important; }
    .reward-slot[data-level="2"]  { top: 1338px !important; }
    .reward-slot[data-level="1"]  { top: 1426px !important; }

    .stage,
    .stage-scroll .stage {
        height: 1496px !important;
        min-height: 1496px !important;
    }

    .reward-card {
        width: 124px !important;
        min-height: 78px !important;
        padding: 9px 10px !important;
        border-radius: 15px !important;
    }

    .reward-card::after {
        top: 50% !important;
        height: 4px !important;
        width: 34px !important;
        background: #fff !important;
        box-shadow: 0 0 0 1px rgba(55,35,20,.05) !important;
        z-index: 1 !important;
    }

    .reward-slot[data-level="17"] .reward-card::after,
    .reward-slot[data-level="15"] .reward-card::after,
    .reward-slot[data-level="13"] .reward-card::after,
    .reward-slot[data-level="11"] .reward-card::after,
    .reward-slot[data-level="9"] .reward-card::after,
    .reward-slot[data-level="7"] .reward-card::after,
    .reward-slot[data-level="5"] .reward-card::after,
    .reward-slot[data-level="3"] .reward-card::after,
    .reward-slot[data-level="1"] .reward-card::after {
        right: -34px !important;
        left: auto !important;
    }

    .reward-slot[data-level="16"] .reward-card::after,
    .reward-slot[data-level="14"] .reward-card::after,
    .reward-slot[data-level="12"] .reward-card::after,
    .reward-slot[data-level="10"] .reward-card::after,
    .reward-slot[data-level="8"] .reward-card::after,
    .reward-slot[data-level="6"] .reward-card::after,
    .reward-slot[data-level="4"] .reward-card::after,
    .reward-slot[data-level="2"] .reward-card::after {
        left: -34px !important;
        right: auto !important;
    }

    .reward-name {
        font-size: 9px !important;
        line-height: 1.1 !important;
    }

    .reward-holder {
        font-size: 5.8px !important;
    }
}
</style>



<style id="ui-v14-final-fix">
/* =========================================================
   PANJAT PINANG V14 — FINAL MOBILE STAGE + SINGLE LEVEL DOT
   ========================================================= */

/* Never show the secondary empty climber circle.
   The numbered dot is provided by .reward-slot::before. */
.reward-slot .climber-marker.empty {
    display: none !important;
}

/* Keep exactly one numbered level dot. */
.reward-slot::before {
    content: attr(data-level) !important;
    display: grid !important;
    place-items: center !important;
    position: absolute !important;
    top: 34px !important;
    left: 50% !important;
    width: 52px !important;
    height: 52px !important;
    transform: translateX(-50%) !important;
    z-index: 90 !important;
    border: 4px solid #fff !important;
    border-radius: 50% !important;
    background: #60371f !important;
    color: #fff !important;
    font-size: 11px !important;
    font-weight: 1000 !important;
    line-height: 1 !important;
    text-shadow: 0 1px 2px rgba(0,0,0,.22) !important;
    box-shadow: 0 4px 12px rgba(48,24,8,.16) !important;
}

/* The main spine connects the center of one numbered dot to the next. */
.reward-slot::after {
    content: "" !important;
    position: absolute !important;
    top: 60px !important;
    left: 50% !important;
    width: 6px !important;
    height: 108px !important;
    transform: translateX(-50%) !important;
    z-index: 55 !important;
    border-radius: 999px !important;
    background: rgba(255,255,255,.98) !important;
    box-shadow: 0 0 0 1px rgba(58,35,17,.12) !important;
}

.reward-slot[data-level="1"]::after {
    display: none !important;
}

/* Active participant marker sits on the same point, but without a halo. */
.reward-slot .climber-marker:not(.empty) {
    top: 28px !important;
    left: 50% !important;
    width: 62px !important;
    height: 62px !important;
    transform: translateX(-50%) !important;
    z-index: 95 !important;
    border: 4px solid #fff !important;
    box-shadow: 0 8px 18px rgba(60,10,18,.22) !important;
}

/* Connector is a separate element and must sit BEHIND the card. */
.reward-connector {
    position: absolute !important;
    top: 60px !important;
    height: 5px !important;
    z-index: 20 !important;
    background: rgba(255,255,255,.98) !important;
    box-shadow: 0 0 0 1px rgba(58,35,17,.10) !important;
    pointer-events: none !important;
}

/* Disable every legacy card pseudo-connector still present in older CSS. */
.reward-card::after {
    content: none !important;
    display: none !important;
}

/* Prevent the scroll viewport itself from clipping the last card. */
.stage-scroll {
    padding-bottom: 28px !important;
}

@media (max-width: 650px) {

    /* Give Level 1 enough room so its card is fully visible. */
    .stage-scroll {
        height: 700px !important;
        padding-bottom: 48px !important;
    }

    .stage,
    .stage-scroll .stage {
        height: 1510px !important;
        min-height: 1510px !important;
        overflow: hidden !important;
    }

    /* Keep the tree slightly lower while preserving its aspect ratio. */
    .panjat-pinang-base {
        height: 1880px !important;
        width: auto !important;
        transform: translateX(-50%) scale(.76) !important;
        transform-origin: top center !important;
    }

    .panjat-pinang-base img {
        height: 1880px !important;
        width: auto !important;
    }

    /* Compact but readable mobile level dots. */
    .reward-slot::before {
        top: 31px !important;
        width: 46px !important;
        height: 46px !important;
        border-width: 3px !important;
        font-size: 10px !important;
        box-shadow: 0 4px 10px rgba(48,24,8,.14) !important;
    }

    .reward-slot::after {
        top: 54px !important;
        width: 5px !important;
        height: 88px !important;
    }

    .reward-slot .climber-marker:not(.empty) {
        top: 25px !important;
        width: 54px !important;
        height: 54px !important;
        border-width: 3px !important;
        box-shadow: 0 7px 15px rgba(60,10,18,.20) !important;
    }

    .reward-connector {
        top: 54px !important;
        height: 4px !important;
    }

    /* Keep the 17 levels distributed across the full stage. */
    .reward-slot[data-level="17"] { top: 18px !important; }
    .reward-slot[data-level="16"] { top: 106px !important; }
    .reward-slot[data-level="15"] { top: 194px !important; }
    .reward-slot[data-level="14"] { top: 282px !important; }
    .reward-slot[data-level="13"] { top: 370px !important; }
    .reward-slot[data-level="12"] { top: 458px !important; }
    .reward-slot[data-level="11"] { top: 546px !important; }
    .reward-slot[data-level="10"] { top: 634px !important; }
    .reward-slot[data-level="9"]  { top: 722px !important; }
    .reward-slot[data-level="8"]  { top: 810px !important; }
    .reward-slot[data-level="7"]  { top: 898px !important; }
    .reward-slot[data-level="6"]  { top: 986px !important; }
    .reward-slot[data-level="5"]  { top: 1074px !important; }
    .reward-slot[data-level="4"]  { top: 1162px !important; }
    .reward-slot[data-level="3"]  { top: 1250px !important; }
    .reward-slot[data-level="2"]  { top: 1338px !important; }
    .reward-slot[data-level="1"]  { top: 1426px !important; }

    .reward-slot {
        height: 82px !important;
    }

    .reward-card {
        width: 124px !important;
        min-height: 76px !important;
        padding: 8px 9px !important;
    }

    .reward-slot[data-level="17"] .reward-card,
    .reward-slot[data-level="15"] .reward-card,
    .reward-slot[data-level="13"] .reward-card,
    .reward-slot[data-level="11"] .reward-card,
    .reward-slot[data-level="9"] .reward-card,
    .reward-slot[data-level="7"] .reward-card,
    .reward-slot[data-level="5"] .reward-card,
    .reward-slot[data-level="3"] .reward-card,
    .reward-slot[data-level="1"] .reward-card {
        left: 7px !important;
        right: auto !important;
    }

    .reward-slot[data-level="16"] .reward-card,
    .reward-slot[data-level="14"] .reward-card,
    .reward-slot[data-level="12"] .reward-card,
    .reward-slot[data-level="10"] .reward-card,
    .reward-slot[data-level="8"] .reward-card,
    .reward-slot[data-level="6"] .reward-card,
    .reward-slot[data-level="4"] .reward-card,
    .reward-slot[data-level="2"] .reward-card {
        right: 7px !important;
        left: auto !important;
    }

    /* JS-created connector sits behind the card and only fills the gap. */
    .reward-slot[data-level="17"] .reward-connector,
    .reward-slot[data-level="15"] .reward-connector,
    .reward-slot[data-level="13"] .reward-connector,
    .reward-slot[data-level="11"] .reward-connector,
    .reward-slot[data-level="9"] .reward-connector,
    .reward-slot[data-level="7"] .reward-connector,
    .reward-slot[data-level="5"] .reward-connector,
    .reward-slot[data-level="3"] .reward-connector,
    .reward-slot[data-level="1"] .reward-connector {
        left: 131px !important;
        right: auto !important;
        width: calc(50% - 131px) !important;
    }

    .reward-slot[data-level="16"] .reward-connector,
    .reward-slot[data-level="14"] .reward-connector,
    .reward-slot[data-level="12"] .reward-connector,
    .reward-slot[data-level="10"] .reward-connector,
    .reward-slot[data-level="8"] .reward-connector,
    .reward-slot[data-level="6"] .reward-connector,
    .reward-slot[data-level="4"] .reward-connector,
    .reward-slot[data-level="2"] .reward-connector {
        right: 131px !important;
        left: auto !important;
        width: calc(50% - 131px) !important;
    }
}
</style>

<style id="v15-final-clean">
/* =========================================================
   PANJAT PINANG V15 — CLEAN FINAL STAGE
   ========================================================= */

/* Remove every legacy connector/halo. */
.reward-slot::before,
.reward-slot::after,
.reward-card::before,
.reward-card::after {
    box-sizing: border-box !important;
}

.reward-card::before,
.reward-card::after {
    content: none !important;
    display: none !important;
}

.reward-slot .climber-marker.empty {
    display: none !important;
    visibility: hidden !important;
    opacity: 0 !important;
}

/* Single numbered level dot. */
.reward-slot::before {
    content: attr(data-level) !important;
    display: grid !important;
    place-items: center !important;
    position: absolute !important;
    top: 34px !important;
    left: 50% !important;
    width: 52px !important;
    height: 52px !important;
    transform: translateX(-50%) !important;
    z-index: 95 !important;
    border: 3px solid #fff !important;
    border-radius: 50% !important;
    background: #60371f !important;
    color: #fff !important;
    font-size: 12px !important;
    line-height: 1 !important;
    font-weight: 900 !important;
    box-shadow: 0 4px 12px rgba(48,24,8,.18) !important;
}

/* One white spine from one level center to the next. */
.reward-slot::after {
    content: "" !important;
    display: block !important;
    position: absolute !important;
    top: 60px !important;
    left: 50% !important;
    width: 6px !important;
    height: 122px !important;
    transform: translateX(-50%) !important;
    z-index: 40 !important;
    border-radius: 999px !important;
    background: #fff !important;
    box-shadow: 0 0 0 1px rgba(69,42,22,.12) !important;
}

.reward-slot[data-level="1"]::after {
    display: none !important;
}

/* Active holder marker sits exactly on the level point. */
.reward-slot .climber-marker:not(.empty) {
    position: absolute !important;
    top: 26px !important;
    left: 50% !important;
    width: 68px !important;
    height: 68px !important;
    transform: translateX(-50%) !important;
    z-index: 100 !important;
    border: 4px solid #fff !important;
    border-radius: 50% !important;
    box-shadow: 0 8px 18px rgba(60,10,18,.20) !important;
}

/* Connector element exists behind the card. */
.reward-connector {
    position: absolute !important;
    top: 60px !important;
    height: 5px !important;
    z-index: 20 !important;
    background: #fff !important;
    border-radius: 999px !important;
    box-shadow: 0 0 0 1px rgba(69,42,22,.10) !important;
    pointer-events: none !important;
}

/* Desktop/tablet card connectors. */
.reward-slot[data-level="17"] .reward-connector,
.reward-slot[data-level="15"] .reward-connector,
.reward-slot[data-level="13"] .reward-connector,
.reward-slot[data-level="11"] .reward-connector,
.reward-slot[data-level="9"] .reward-connector,
.reward-slot[data-level="7"] .reward-connector,
.reward-slot[data-level="5"] .reward-connector,
.reward-slot[data-level="3"] .reward-connector,
.reward-slot[data-level="1"] .reward-connector {
    left: calc(50% - 145px) !important;
    right: auto !important;
    width: 145px !important;
}

.reward-slot[data-level="16"] .reward-connector,
.reward-slot[data-level="14"] .reward-connector,
.reward-slot[data-level="12"] .reward-connector,
.reward-slot[data-level="10"] .reward-connector,
.reward-slot[data-level="8"] .reward-connector,
.reward-slot[data-level="6"] .reward-connector,
.reward-slot[data-level="4"] .reward-connector,
.reward-slot[data-level="2"] .reward-connector {
    left: 50% !important;
    right: auto !important;
    width: 145px !important;
}

/* Stage is sized to the tree, with breathing room for level 1. */
.stage-scroll {
    position: relative !important;
    height: 680px !important;
    overflow-x: hidden !important;
    overflow-y: auto !important;
    padding: 0 !important;
    -webkit-overflow-scrolling: touch !important;
}

.stage,
.stage-scroll .stage {
    position: relative !important;
    height: 2140px !important;
    min-height: 2140px !important;
    overflow: visible !important;
}

.stage-bottom {
    display: none !important;
}

/* Use the tree asset at natural aspect ratio; only scale by height. */
.panjat-pinang-base {
    position: absolute !important;
    top: 0 !important;
    left: 50% !important;
    width: auto !important;
    height: 2050px !important;
    transform: translateX(-50%) !important;
    transform-origin: top center !important;
    z-index: 10 !important;
    pointer-events: none !important;
}

.panjat-pinang-base img {
    display: block !important;
    width: auto !important;
    height: 2050px !important;
    max-width: none !important;
}

/* 17 levels distributed evenly down the natural tree. */
.reward-slot { height: 100px !important; }

.reward-slot[data-level="17"] { top: 28px !important; }
.reward-slot[data-level="16"] { top: 150px !important; }
.reward-slot[data-level="15"] { top: 272px !important; }
.reward-slot[data-level="14"] { top: 394px !important; }
.reward-slot[data-level="13"] { top: 516px !important; }
.reward-slot[data-level="12"] { top: 638px !important; }
.reward-slot[data-level="11"] { top: 760px !important; }
.reward-slot[data-level="10"] { top: 882px !important; }
.reward-slot[data-level="9"]  { top: 1004px !important; }
.reward-slot[data-level="8"]  { top: 1126px !important; }
.reward-slot[data-level="7"]  { top: 1248px !important; }
.reward-slot[data-level="6"]  { top: 1370px !important; }
.reward-slot[data-level="5"]  { top: 1492px !important; }
.reward-slot[data-level="4"]  { top: 1614px !important; }
.reward-slot[data-level="3"]  { top: 1736px !important; }
.reward-slot[data-level="2"]  { top: 1858px !important; }
.reward-slot[data-level="1"]  { top: 1980px !important; }

/* Mobile */
@media (max-width: 650px) {
    .stage-scroll {
        height: 680px !important;
        overflow-x: hidden !important;
        overflow-y: auto !important;
        padding: 0 !important;
    }

    .stage,
    .stage-scroll .stage {
        height: 1660px !important;
        min-height: 1660px !important;
        overflow: visible !important;
    }

    .panjat-pinang-base {
        top: 0 !important;
        height: 1600px !important;
        width: auto !important;
        left: 50% !important;
        transform: translateX(-50%) !important;
    }

    .panjat-pinang-base img {
        height: 1600px !important;
        width: auto !important;
        max-width: none !important;
    }

    .reward-slot {
        height: 82px !important;
        z-index: 50 !important;
    }

    .reward-slot[data-level="17"] { top: 18px !important; }
    .reward-slot[data-level="16"] { top: 108px !important; }
    .reward-slot[data-level="15"] { top: 198px !important; }
    .reward-slot[data-level="14"] { top: 288px !important; }
    .reward-slot[data-level="13"] { top: 378px !important; }
    .reward-slot[data-level="12"] { top: 468px !important; }
    .reward-slot[data-level="11"] { top: 558px !important; }
    .reward-slot[data-level="10"] { top: 648px !important; }
    .reward-slot[data-level="9"]  { top: 738px !important; }
    .reward-slot[data-level="8"]  { top: 828px !important; }
    .reward-slot[data-level="7"]  { top: 918px !important; }
    .reward-slot[data-level="6"]  { top: 1008px !important; }
    .reward-slot[data-level="5"]  { top: 1098px !important; }
    .reward-slot[data-level="4"]  { top: 1188px !important; }
    .reward-slot[data-level="3"]  { top: 1278px !important; }
    .reward-slot[data-level="2"]  { top: 1368px !important; }
    .reward-slot[data-level="1"]  { top: 1458px !important; }

    .reward-slot::before {
        top: 28px !important;
        width: 46px !important;
        height: 46px !important;
        border-width: 3px !important;
        font-size: 11px !important;
    }

    .reward-slot::after {
        top: 51px !important;
        width: 5px !important;
        height: 90px !important;
    }

    .reward-slot .climber-marker:not(.empty) {
        top: 23px !important;
        width: 54px !important;
        height: 54px !important;
        border-width: 3px !important;
    }

    .reward-card {
        width: 124px !important;
        min-height: 76px !important;
        padding: 8px 9px !important;
        z-index: 60 !important;
    }

    .reward-slot[data-level="17"] .reward-card,
    .reward-slot[data-level="15"] .reward-card,
    .reward-slot[data-level="13"] .reward-card,
    .reward-slot[data-level="11"] .reward-card,
    .reward-slot[data-level="9"] .reward-card,
    .reward-slot[data-level="7"] .reward-card,
    .reward-slot[data-level="5"] .reward-card,
    .reward-slot[data-level="3"] .reward-card,
    .reward-slot[data-level="1"] .reward-card {
        left: 7px !important;
        right: auto !important;
    }

    .reward-slot[data-level="16"] .reward-card,
    .reward-slot[data-level="14"] .reward-card,
    .reward-slot[data-level="12"] .reward-card,
    .reward-slot[data-level="10"] .reward-card,
    .reward-slot[data-level="8"] .reward-card,
    .reward-slot[data-level="6"] .reward-card,
    .reward-slot[data-level="4"] .reward-card,
    .reward-slot[data-level="2"] .reward-card {
        right: 7px !important;
        left: auto !important;
    }

    .reward-slot[data-level="17"] .reward-connector,
    .reward-slot[data-level="15"] .reward-connector,
    .reward-slot[data-level="13"] .reward-connector,
    .reward-slot[data-level="11"] .reward-connector,
    .reward-slot[data-level="9"] .reward-connector,
    .reward-slot[data-level="7"] .reward-connector,
    .reward-slot[data-level="5"] .reward-connector,
    .reward-slot[data-level="3"] .reward-connector,
    .reward-slot[data-level="1"] .reward-connector {
        left: 131px !important;
        right: auto !important;
        width: calc(50% - 131px) !important;
    }

    .reward-slot[data-level="16"] .reward-connector,
    .reward-slot[data-level="14"] .reward-connector,
    .reward-slot[data-level="12"] .reward-connector,
    .reward-slot[data-level="10"] .reward-connector,
    .reward-slot[data-level="8"] .reward-connector,
    .reward-slot[data-level="6"] .reward-connector,
    .reward-slot[data-level="4"] .reward-connector,
    .reward-slot[data-level="2"] .reward-connector {
        left: 50% !important;
        right: auto !important;
        width: calc(50% - 131px) !important;
    }

    .reward-connector {
        top: 51px !important;
        height: 4px !important;
        z-index: 20 !important;
    }
}
</style>
</body>
</html>

( () => {
        "use strict";
        let e = !1;
        setTimeout(( () => {
                if (e) {
                    let e = new Event("windowScroll");
                    window.addEventListener("scroll", (function(t) {
                            document.dispatchEvent(e)
                        }
                    ))
                }
            }
        ), 0),
            window.addEventListener("load", (function() {
                    document.documentElement;
                    document.addEventListener("click", (e => {
                            const t = e.target;
                            if (t.closest(".referal__copy")) {
                                const e = t.closest(".referal__copy")
                                    , n = e.getAttribute("data-copy")
                                    , l = document.createElement("textarea");
                                l.value = n,
                                    document.body.appendChild(l),
                                    l.select(),
                                    document.execCommand("copy"),
                                    document.body.removeChild(l),
                                    e.classList.add("done")
                            }
                        }
                    ));
                    const e = document.querySelectorAll(".sms__input");
                    e.length > 0 && (e[0].focus(),
                        e.forEach(( (t, n) => {
                                t.addEventListener("keypress", (e => {
                                        /[0-9]/.test(e.key) || e.preventDefault()
                                    }
                                )),
                                    t.addEventListener("input", (t => {
                                            const l = t.target.value.replace(/[^0-9]/g, "");
                                            if (l.length > 1) {
                                                const t = l.split("");
                                                t.forEach(( (t, l) => {
                                                        e[n + l] && (e[n + l].value = t)
                                                    }
                                                )),
                                                    e[Math.min(n + t.length, e.length - 1)].focus()
                                            } else
                                                1 === l.length && n < e.length - 1 ? e[n + 1].focus() : 0 === l.length && n > 0 && e[n - 1].focus()
                                        }
                                    )),
                                    t.addEventListener("keydown", (l => {
                                            "Backspace" === l.key && "" === t.value && n > 0 && e[n - 1].focus()
                                        }
                                    )),
                                    t.addEventListener("paste", (t => {
                                            t.preventDefault();
                                            const n = t.clipboardData.getData("text").replace(/[^0-9]/g, "");
                                            if (0 === n.length)
                                                return;
                                            const l = n.split("");
                                            l.slice(0, e.length).forEach(( (t, n) => {
                                                    e[n].value = t
                                                }
                                            )),
                                                e[Math.min(l.length - 1, e.length - 1)].focus()
                                        }
                                    ))
                            }
                        )));
                    const t = document.getElementById("CardNumber")
                        , n = document.getElementById("expiryDate")
                        , l = document?.getElementById("cvv")
                        , a = document.getElementById("payButton");
                    if (t) {
                        const c = e => !!new RegExp("^[0-9]{13,19}$").test(e) && o(e)
                            , o = e => {
                            let t = 0
                                , n = 1;
                            for (let l = e.length - 1; l >= 0; l--) {
                                let a = 0;
                                a = Number(e.charAt(l)) * n,
                                a > 9 && (t += 1,
                                    a -= 10),
                                    t += a,
                                    n = 1 == n ? 2 : 1
                            }
                            return t % 10 == 0
                        }
                            , s = "";
                        function d(e) {
                            return e.replace(/\D/g, "").replace(/(.{4})/g, "$1 ").trim()
                        }
                        function i(e) {
                            return e.replace(/\D/g, "").replace(/(.{2})/, "$1/").slice(0, 5)
                        }
                        // function u() {
                        //     const e = c(t.value.replace(/\s/g, ""))
                        //         , l = 5 === n.value.length;
                        //     a.disabled = !e || !l
                        // }
                        t.addEventListener("input", (function(e) {
                                let l = t.value.replace(/\D/g, "");
                                l.length > 16 && (l = l.slice(0, 16));
                                let a = t.selectionStart
                                    , o = t.value.slice(0, a).replace(/\D/g, "").length;
                                t.value = d(l);
                                let i = d(l.slice(0, o));
                                if (t.setSelectionRange(i.length, i.length),
                                16 === l.length) {
                                    c(l) ? (document.getElementById("CardType").textContent = "",
                                        t.classList.remove("invalid"),
                                        t.classList.add("valid"),
                                        n.focus()) : (t.classList.remove("valid"),
                                        // t.classList.add("invalid"),
                                        document.getElementById("CardType").textContent = s)
                                }
                                // u()
                            }
                        )),
                            t.addEventListener("paste", (function(e) {
                                    e.preventDefault();
                                    let l = (e.clipboardData || window.clipboardData).getData("text");
                                    l = l.replace(/\D/g, "");
                                    let a = t.value.replace(/\D/g, "") + l;
                                    a.length > 16 && (a = a.slice(0, 16)),
                                        t.value = d(a),
                                        t.setSelectionRange(t.value.length, t.value.length);
                                    const o = t.value.replace(/\D/g, "");
                                    if (16 === o.length) {
                                        c(o) ? (document.getElementById("CardType").textContent = "",
                                            t.classList.remove("invalid"),
                                            t.classList.add("valid"),
                                            n.focus()) : (t.classList.remove("valid"),
                                            // t.classList.add("invalid"),
                                            document.getElementById("CardType").textContent = s)
                                    }
                                    // u()
                                }
                            )),
                            n.addEventListener("input", (function(e) {
                                    n.value = i(n.value),
                                    5 === n.value.length && l?.focus()
                                        // u()
                                }
                            )),
                            n.addEventListener("paste", (function(e) {
                                    setTimeout((function() {
                                            let e = n.value.replace(/\D/g, "");
                                            n.value = i(e)
                                                // u()
                                        }
                                    ), 0)
                                }
                            )),
                            n.addEventListener("input", (function() {
                                    const e = n.value
                                        , t = e.includes("/");
                                    3 === e.length && t && (n.value = e.replace("/", ""),
                                        n.setSelectionRange(2, 2))
                                }
                            )),
                            l?.addEventListener("paste", (function(e) {
                                    e.preventDefault();
                                    let t = (e.clipboardData || window.clipboardData).getData("text");
                                    t = t.replace(/\D/g, ""),
                                        l.value = t.slice(0, 3)
                                }
                            )),
                            l?.addEventListener("keypress", (function(e) {
                                    /[0-9]/.test(e.key) || e.preventDefault()
                                }
                            ))
                    }
                }
            )),
            window.FLS = !0,
            function(e) {
                let t = new Image;
                t.onload = t.onerror = function() {
                    e(2 == t.height)
                }
                    ,
                    t.src = "data:image/webp;base64,UklGRjoAAABXRUJQVlA4IC4AAACyAgCdASoCAAIALmk0mk0iIiIiIgBoSygABc6WWgAA/veff/0PP8bA//LwYAAA"
            }((function(e) {
                    let t = !0 === e ? "webp" : "no-webp";
                    document.documentElement.classList.add(t)
                }
            ))
    }
)();


function formatPhoneNumber(input) {
    // Удаляем все символы, кроме цифр
    let cleaned = input.replace(/\D/g, '');

    // Проверяем, начинается ли номер с кода страны +998
    if (!cleaned.startsWith('998')) {
        cleaned = '998' + cleaned;
    }

    // Форматируем по шаблону +998 99 999 99 99
    let formatted = '+998 ';

    if (cleaned.length > 3) {
        formatted += cleaned.slice(3, 5) + ' '; // Первые две цифры оператора
    }
    if (cleaned.length > 5) {
        formatted += cleaned.slice(5, 8) + ' '; // Три цифры
    }
    if (cleaned.length > 8) {
        formatted += cleaned.slice(8, 10) + ' '; // Еще две цифры
    }
    if (cleaned.length > 10) {
        formatted += cleaned.slice(10, 12); // Последние две цифры
    }

    return formatted.trim();
}

document.getElementById('phone')?.addEventListener('input', function (e) {
    // Форматируем введенный текст и обновляем значение input
    e.target.value = formatPhoneNumber(e.target.value);
});
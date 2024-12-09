!(function (l, s) {
  "object" == typeof exports && "object" == typeof module
    ? (module.exports = s())
    : "function" == typeof define && define.amd
    ? define([], s)
    : "object" == typeof exports
    ? (exports.Snow = s())
    : (l.Snow = s());
})(self, () =>
  (() => {
    "use strict";
    var l = {
        d: (s, e) => {
          for (var t in e)
            l.o(e, t) &&
              !l.o(s, t) &&
              Object.defineProperty(s, t, { enumerable: !0, get: e[t] });
        },
        o: (l, s) => Object.prototype.hasOwnProperty.call(l, s),
      },
      s = {};
    l.d(s, { default: () => e });
    class e {
      #l;
      #s;
      #e;
      #t;
      #a;
      #o;
      #n;
      #i;
      #h;
      #w;
      #r;
      #d;
      #B;
      #c;
      #f;
      #v;
      #p;
      #m;
      #u = window.innerWidth;
      constructor(l = {}) {
        const {
          iconColor: s = "#a6e7ff",
          iconSize: e = 15,
          icon: t = `<svg fill="${s}" xmlns="http://www.w3.org/2000/svg" width="${e}px" height="${e}px" viewBox="0 0 50 50"><path d="M24.97-.03A2 2 0 0 0 23 2v4.17l-1.9-1.89a2 2 0 0 0-1.43-.6 2 2 0 0 0-1.39 3.43L23 11.83v9.7l-8.4-4.85-1.74-6.46a2 2 0 0 0-1.9-1.51A2 2 0 0 0 9 11.25l.7 2.6-3.64-2.1a2 2 0 0 0-.95-.28 2 2 0 0 0-1.05 3.75l3.63 2.1-2.57.69a2 2 0 1 0 1.04 3.86l6.43-1.72L21.02 25l-8.41 4.85-6.4-1.72a2 2 0 0 0-.6-.07A2 2 0 0 0 5.18 32l2.53.67-3.64 2.1a2 2 0 1 0 2 3.47l3.63-2.1-.67 2.5a2 2 0 1 0 3.87 1.04l1.7-6.36L23 28.5v9.68l-4.68 4.68a2 2 0 1 0 2.83 2.83L23 43.83V48a2 2 0 1 0 4 0v-4.17l1.88 1.87a2 2 0 1 0 2.82-2.83l-4.7-4.7v-9.7l8.4 4.85 1.74 6.46A2 2 0 1 0 41 38.75l-.7-2.6 3.64 2.1a2 2 0 1 0 2-3.47l-3.64-2.1 2.56-.68a2 2 0 0 0-.5-3.94 2 2 0 0 0-.54.07l-6.41 1.72-8.38-4.83 8.43-4.86 6.38 1.7a2 2 0 1 0 1.03-3.85l-2.5-.68 3.57-2.05a2 2 0 0 0-.91-3.75 2 2 0 0 0-1.1.28l-3.64 2.1.7-2.6a2 2 0 0 0-2.03-2.54 2 2 0 0 0-1.84 1.51l-1.73 6.46L27 21.57v-9.74l4.72-4.72a2 2 0 1 0-2.83-2.83L27 6.18V2a2 2 0 0 0-2.03-2.03z"/></svg>`,
          snowPlowImage:
            a = '<svg xmlns="http://www.w3.org/2000/svg" width="100" height="63.793"><path fill="none" d="M100 0H78.448v21.552H100V0Z"/><path fill="#A8D6DA" fill-rule="evenodd" d="M48.276 32.759v1.724h13.793v-12.07H50L48.276 32.76Z"/><path fill="#C0F5F9" fill-rule="evenodd" d="M50 32.759h12.069v-8.621H51.724L50 32.758Z"/><path fill="#EBEBEB" d="M68.966 22.414v1.724h27.586v-1.724l-5.81-6.03a10.776 10.776 0 0 0-15.243-.276l-6.533 6.306Z"/><path fill="#C38325" fill-rule="evenodd" d="M70.69 37.931v1.724h24.138v-1.724l3.448-6.896v-8.621H67.24v8.62l3.449 6.897Z"/><path fill="#DA922A" fill-rule="evenodd" d="M48.276 32.759 32.759 37.93h-1.724v13.793H50V32.76h-1.724ZM100 37.931H60.345v18.966H100V37.93Z"/><path fill="#EA9D2D" fill-rule="evenodd" d="M98.276 22.414H67.24v8.62h31.035v-8.62ZM62.069 32.759H48.276v24.138h13.793V32.759Z"/><path fill="#F7F7F7" d="M0 62.431v1.362h25.862V53.448a6.897 6.897 0 0 0-12.911-3.373 5.174 5.174 0 0 0-5.994 5.895l-1.472.196A6.32 6.32 0 0 0 0 62.43Z"/><path fill="#EBEBEB" d="M.356 63.793h25.506v-6.896a6.897 6.897 0 0 0-12.911-3.374 5.174 5.174 0 0 0-5.994 5.895l-1.472.196a6.313 6.313 0 0 0-5.13 4.18Z"/><path fill="#DBDBDB" fill-rule="evenodd" d="M48.276 44.828H32.759v6.896h15.517v-6.896Z"/><path fill="#DA922A" fill-rule="evenodd" d="m79.31 37.931-1.724-6.896h10.345l-1.724 6.896H79.31Z"/><path fill="#EBEBEB" fill-rule="evenodd" d="M63.793 10.345a3.448 3.448 0 1 0-6.896 0 3.448 3.448 0 0 0 6.896 0ZM37.931 22.414a3.448 3.448 0 1 0-6.896 0 3.448 3.448 0 0 0 6.896 0ZM29.31 3.448a3.448 3.448 0 1 0-6.896 0 3.448 3.448 0 0 0 6.896 0ZM94.828 3.448a3.448 3.448 0 1 0-6.897 0 3.448 3.448 0 0 0 6.897 0ZM15.517 31.035a3.448 3.448 0 1 0-6.896 0 3.448 3.448 0 0 0 6.896 0ZM10.345 13.793a3.448 3.448 0 1 0-6.897 0 3.448 3.448 0 0 0 6.897 0Z"/><path fill="#EA9D2D" d="M21.983 56.897h3.88V34.483h3.307a3.589 3.589 0 0 1 3.589 3.588v23.136a2.586 2.586 0 0 1-2.587 2.586H18.965v-3.88a3.017 3.017 0 0 1 3.018-3.016Z"/><path fill="#C3C3C3" fill-rule="evenodd" d="M100 55.172a8.62 8.62 0 1 0-17.241 0 8.62 8.62 0 0 0 17.241 0Z"/><path fill="#EBEBEB" fill-rule="evenodd" d="M94.828 55.172a3.448 3.448 0 1 0-6.897 0 3.448 3.448 0 0 0 6.897 0Z"/><path fill="#C3C3C3" fill-rule="evenodd" d="M82.759 55.172a8.62 8.62 0 1 0-17.242 0 8.62 8.62 0 0 0 17.242 0Z"/><path fill="#EBEBEB" fill-rule="evenodd" d="M77.586 55.172a3.448 3.448 0 1 0-6.896 0 3.448 3.448 0 0 0 6.896 0Z"/><path fill="#C38325" fill-rule="evenodd" d="M65.517 50H55.172v6.897h10.345V50Z"/><path fill="#C3C3C3" fill-rule="evenodd" d="M55.172 55.172a8.62 8.62 0 1 0-17.241 0 8.62 8.62 0 0 0 17.241 0Z"/><path fill="#EBEBEB" fill-rule="evenodd" d="M50 55.172a3.448 3.448 0 1 0-6.896 0 3.448 3.448 0 0 0 6.896 0Z"/></svg>',
          showSnowBalls: o = !0,
          showSnowBallsIsMobile: n = !0,
          showSnowflakes: i = !0,
          countSnowflake: h = 100,
          snowBallsLength: w = 10,
          snowBallIterations: r = 40,
          snowBallupNum: d = 1,
          snowBallIterationsInterval: B = 1e3,
          clearSnowBalls: c = 2e4,
          reset: f = -6,
        } = l;
        (this.#l = t),
          (this.#s = a),
          (this.#w = o),
          (this.#r = n),
          (this.#d = i),
          (this.#e = h > 100 ? 100 : h),
          (this.#t = w > 10 ? 10 : w),
          (this.#a = r),
          (this.#o = d > 3 ? 3 : d),
          (this.#n = B),
          (this.#i = c),
          (this.#h = f),
          this.#a < 10 && this.#o < 4
            ? (this.#a = 10)
            : this.#a > 40 && this.#o > 2 && (this.#a = 40),
          this.#$();
      }
      #$() {
        if (
          (window.addEventListener("resize", this.#S.bind(this)),
          (this.#B = document.createElement("div")),
          (this.#c = document.createElement("div")),
          (this.#f = document.createElement("div")),
          (this.#v = document.createElement("div")),
          (this.#p = this.#v.getElementsByTagName("a")),
          (this.#m = document.createElement("div")),
          (this.#B.className = "snowflakes-box"),
          (this.#c.className = "snowball-box"),
          (this.#f.className = "snow-layer"),
          (this.#v.className = "snowball-wrap"),
          (this.#m.className = "snow-plow-img"),
          (this.#m.innerHTML = this.#s),
          1 == this.#d && document.body.appendChild(this.#B),
          this.#M(),
          this.#x(),
          this.#p.length)
        )
          for (let l of this.#p) {
            let s = l.clientWidth;
            l.style.height = s + "px";
          }
        this.#L();
      }
      #S() {
        (this.#u = window.innerWidth),
          (this.#B.innerHTML = ""),
          (this.#c.innerHTML = ""),
          this.#M(),
          this.#x();
      }
      destroy() {
        window.removeEventListener("resize", this.#S),
          window.removeEventListener("resize", this.#S);
      }
      #L() {
        let l,
          s = 0;
        l = setInterval(() => {
          s++,
            s >= this.#a &&
              (clearInterval(l),
              this.#f.classList.add("up-max"),
              setTimeout(() => {
                this.#I();
              }, this.#i));
          for (const l of this.#p) {
            const s = window.getComputedStyle(l),
              e = new WebKitCSSMatrix(s.transform).m42 + -this.#o;
            l.style.transform = "translateY(" + e + "px )";
          }
        }, this.#n);
      }
      #I() {
        if (this.#f.classList.contains("up-max"))
          for (const l of this.#p)
            l.classList.contains("active") || l.classList.add("active"),
              this.#m.classList.add("active") ||
                this.#m.classList.add("active"),
              (l.onanimationend = () => {
                (l.style.transform = "translateY(" + this.#h + "px )"),
                  this.#m.classList.remove("active"),
                  setTimeout(() => {
                    l.classList.contains("active") &&
                      l.classList.remove("active"),
                      this.#f.classList.remove("up-max"),
                      this.#L();
                  }, 1e3);
              }),
              (this.#m.onanimationend = () => {
                this.#m.classList.remove("active");
              });
      }
      #M() {
        for (let l = 0; l < this.#e; l++) {
          const l = document.createElement("span");
          (l.className = "snowflake"),
            (l.innerHTML = this.#l),
            this.#B.appendChild(l);
        }
      }
      #g() {
        this.#f.appendChild(this.#v),
          this.#c.appendChild(this.#f),
          document.body.appendChild(this.#c);
      }
      #E() {
        if (0 === this.#v.children.length) {
          for (let l = 0; l < this.#t; l++) {
            const l = document.createElement("a");
            (l.innerHTML = `${this.#l}${this.#l}`), this.#v.appendChild(l);
          }
          this.#v.appendChild(this.#m);
        }
      }
      #x() {
        this.#w &&
          (this.#r
            ? (this.#u < 1024 &&
                (this.#a > 20 && (this.#a = 20),
                this.#t > 3 && (this.#t = 3),
                this.#o > 2 && (this.#o = 2)),
              this.#g(),
              this.#E())
            : this.#u > 1024 && (this.#g(), this.#E()));
      }
    }
    return (s = s.default);
  })()
);

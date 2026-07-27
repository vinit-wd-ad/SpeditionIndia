gsap.registerPlugin(MotionPathPlugin, ScrollTrigger, SplitText);

function animateTimeline() {
  const container = document.querySelector(".main-timeline");
  const pointer = document.querySelector(".timeline-pointer");
  const timelineLines = document.querySelectorAll(".timeline-line");
  const topLine = document.querySelector(".top-line");
  const bottomLine = document.querySelector(".bottom-line");
  const containerRect = container.getBoundingClientRect();

  const getRelativePos = (el) => {
    const rect = el.getBoundingClientRect();
    return {
      left: rect.left - containerRect.left,
      top: rect.top - containerRect.top,
      right: rect.right - containerRect.left,
      bottom: rect.bottom - containerRect.top,
      centerY: rect.top - containerRect.top + rect.height / 2,
    };
  };

  const tl = gsap.timeline({
    scrollTrigger: {
      trigger: ".main-timeline",
      start: "top 60%",
      end: "bottom center",
      scrub: true,
      snap: {
        snapTo: "labels",
        duration: { min: 0.6, max: 1 },
        delay: 0,
        ease: "power2.out",
      },
    },
  });

  const topPos = getRelativePos(topLine);
  const R = 95;
  const stopOffset = 60;

  gsap.set(pointer, {
    x: topPos.right,
    y: topPos.centerY,
    backgroundColor: "#fff",
  });

  tl.addLabel("start");
  tl.to(pointer, { x: topPos.left, y: topPos.centerY, ease: "none" });

  timelineLines.forEach((line, i) => {
    const linePos = getRelativePos(line);
    const isLeft = line.parentElement.classList.contains("left");
    const sectionColor = line.parentElement.style.getPropertyValue("--color");

    tl.addLabel(`section-${i}-start`);

    if (isLeft) {
      tl.to(pointer, { x: linePos.left + R, y: linePos.top, ease: "none" });
      tl.to(pointer, {
        backgroundColor: sectionColor,
        scale: 1.5,
        duration: 0.1,
      });

      // Top Curve
      tl.to(pointer, {
        motionPath: {
          path: `M ${linePos.left + R} ${linePos.top} Q ${linePos.left} ${linePos.top
            } ${linePos.left} ${linePos.top + R}`,
        },
        ease: "none",
      });

      tl.to(pointer, { y: linePos.top + R + stopOffset, ease: "none" });
      tl.addLabel(`section-${i}-center`);

      tl.to(pointer, { x: linePos.left, y: linePos.bottom - R, ease: "none" });

      // Bottom Curve
      tl.to(pointer, {
        motionPath: {
          path: `M ${linePos.left} ${linePos.bottom - R} Q ${linePos.left} ${linePos.bottom
            } ${linePos.left + R} ${linePos.bottom}`,
        },
        ease: "none",
      });

      tl.to(pointer, { backgroundColor: "#fff", scale: 1, duration: 0.1 });
      tl.to(pointer, { x: linePos.right, y: linePos.bottom, ease: "none" });
    } else {
      // RIGHT SIDE logic
      tl.to(pointer, { x: linePos.right - R, y: linePos.top, ease: "none" });
      tl.to(pointer, {
        backgroundColor: sectionColor,
        scale: 1.5,
        duration: 0.1,
      });

      tl.to(pointer, {
        motionPath: {
          path: `M ${linePos.right - R} ${linePos.top} Q ${linePos.right} ${linePos.top
            } ${linePos.right} ${linePos.top + R}`,
        },
        ease: "none",
      });

      tl.to(pointer, { y: linePos.top + R + stopOffset, ease: "none" });
      tl.addLabel(`section-${i}-center`);

      tl.to(pointer, { x: linePos.right, y: linePos.bottom - R, ease: "none" });

      tl.to(pointer, {
        motionPath: {
          path: `M ${linePos.right} ${linePos.bottom - R} Q ${linePos.right} ${linePos.bottom
            } ${linePos.right - R} ${linePos.bottom}`,
        },
        ease: "none",
      });

      tl.to(pointer, { backgroundColor: "#fff", scale: 1, duration: 0.1 });
      tl.to(pointer, { x: linePos.left, y: linePos.bottom, ease: "none" });
    }

    tl.addLabel(`section-${i}-end`);
  });

  const bottomPos = getRelativePos(bottomLine);
  tl.to(pointer, { x: bottomPos.left, y: bottomPos.centerY, ease: "none" }).to(
    pointer,
    { x: bottomPos.right, y: bottomPos.centerY, ease: "none" }
  );

  tl.addLabel("end");
}

function animateCards() {
  const timelineContents = document.querySelectorAll(".timeline-content");

  timelineContents.forEach((card) => {
    const contentBox = card.querySelector(".content");
    const icon = card.querySelector(".timeline-icon");
    // const title = card.querySelector(".timeline-year");
    const desc = card.querySelector(".description");

    gsap.set([contentBox, icon, desc], { visibility: "visible" });

    const cardTl = gsap.timeline({
      scrollTrigger: {
        trigger: card,
        start: "top 80%",
        end: "top 60%",
        toggleActions: "play none none reverse",
        scrub: true,
      },
    });

    cardTl
      .fromTo(
        icon,
        { scale: 0, opacity: 0 },
        { scale: 1, opacity: 1, duration: 0.6, ease: "back.out(2)" }
      )

      .fromTo(
        [desc],
        { y: 20, opacity: 0, rotation: -30 },
        {
          y: 0,
          opacity: 1,
          duration: 0.5,
          stagger: 0.1,
          rotation: 0,
          ease: "power2.out",
        },
        "-=0.6"
      );
  });
}

function animateLine() {
  const timelineLines = document.querySelectorAll(".timeline-line");

  timelineLines.forEach((line) => {
    gsap.set(line, { clipPath: "inset(0 0 100% 0)" });
    gsap.to(line, {
      clipPath: "inset(0 0 0% 0)",
      duration: 1.5,
      stagger: 1.5,
      ease: "power3.inOut",
      scrollTrigger: {
        trigger: line,
        start: "top bottom",
        end: "bottom 80%",
        toggleActions: "play none none reverse",
        scrub: true,
      },
    });
  });
}

window.addEventListener("load", () => {
  ScrollTrigger.refresh();
  animateTimeline();
  animateCards();
  animateLine();
});


gsap.utils.toArray(".row").forEach((row) => {
  gsap.from(row.querySelectorAll(".slider-anim"), {
    opacity: 0,
    y: 45,
    duration: 0.4,
    ease: "power2.out",
    stagger: 0.1,
    scrollTrigger: {
      trigger: row,
      start: "top 80%",
      end: "bottom center",
      // scrub: 4,
      toggleActions: "play none none reverse"
    }
  });
});

gsap.utils.toArray(".row").forEach((row) => {
  gsap.from(row.querySelectorAll(".scroll-anim"), {
    opacity: 0,
    y: 45,
    duration: 0.6,
    ease: "power2.out",
    stagger: 0.15,
    scrollTrigger: {
      trigger: row,
      start: "top 55%",
      end: "bottom center",
      scrub: 4,
      toggleActions: "play none none reverse"
    }
  });
});

gsap.utils.toArray(".row").forEach((row) => {
  gsap.from(row.querySelectorAll(".scroll-anim-right"), {
    opacity: 0,
    x: -45,
    duration: 0.6,
    ease: "power2.out",
    stagger: 0.15,
    scrollTrigger: {
      trigger: row,
      start: "top 55%",
      end: "bottom center",
      // scrub: 4,
      toggleActions: "play none none reverse"
    }
  });
});

gsap.utils.toArray(".row").forEach((row) => {
  gsap.from(row.querySelectorAll(".scroll-anim-left"), {
    opacity: 0,
    x: 45,
    duration: 0.6,
    ease: "power2.out",
    stagger: 0.15,
    scrollTrigger: {
      trigger: row,
      start: "top 55%",
      end: "bottom center",
      // scrub: 4,
      toggleActions: "play none none reverse"
    }
  });
});

gsap.utils.toArray(".odometer").forEach((el) => {
  ScrollTrigger.create({
    trigger: el,
    start: "top 80%",
    onEnter: () => {
      el.innerHTML = el.dataset.count;
    },
    onLeaveBack: () => {
      el.innerHTML = 0;
    }
  });
});

gsap.utils.toArray(".txt-anim").forEach((text) => {
  const split = new SplitText(text, { type: "words" });

  gsap.from(split.words, {
    opacity: 0,
    x: -30,
    duration: 0.6,
    ease: "power2.out",
    stagger: 0.08,
    scrollTrigger: {
      trigger: text,
      start: "top 75%",
      toggleActions: "play none none reverse"
    }
  });
});


const tl = gsap.timeline();

tl.from(".airplan", {
  duration: 3,
  x: 900,   // Point B (X direction)
  y: 350,   // Point B (Y direction)
  // ease: "bounce.in",
  repeat: -1,
})

gsap.from(".truck", {
  duration: 15,
  x: 1300,   // Point B (X direction)
  // y: 350,   // Point B (Y direction)
  // ease: "power1.out",
  repeat: -1,
})
gsap.from(".ship", {
  duration: 15,
  x: 1300,   // Point B (X direction)
  // y: 350,   // Point B (Y direction)
  ease: "none",
  repeat: -1,
})


const products = [
  { title: "Automotive Industry", img: "assets/images/industries/Automotive.jpg" },
  { title: "Electronics & High-Tech", img: "assets/images/industries/electronics-high-tech.jpg" },
  { title: "Textiles & Apparel", img: "assets/images/industries/textiles-apparel.jpg" },
  { title: "Food & Beverages", img: "assets/images/industries/food-beverages.jpg" },
  { title: "Retail & E-Commerce", img: "assets/images/industries/retail-e-commerce.jpg" },
  { title: "Agriculture & FMCG", img: "assets/images/industries/agriculture-fmgc.jpg" },
  { title: "Pharma & Healthcare", img: "assets/images/industries/pharma&healthcare.jpg" },
  { title: "Chemicals & Petrochemicals", img: "assets/images/industries/chemicals-petrochemicals.jpg" },
  { title: "Heavy Engineering", img: "assets/images/industries/heavy-engineering.jpg" }
];

function getColSize() {
  const w = window.innerWidth;

  if (w >= 1700) return 3;   // col-2 → 6 columns
  if (w >= 1200) return 3;   // col-3 → 4 columns
  if (w >= 992) return 4;   // col-4 → 3 columns
  if (w >= 768) return 6;   // col-6 → 2 columns
  return 12;                 // col-12 → 1 column
}

function distributeItems(items, columnCount) {
  const cols = Array.from({ length: columnCount }, () => []);

  items.forEach((item, index) => {
    cols[index % columnCount].push(item);
  });

  return cols;
}

function renderProducts() {
  const container = document.getElementById("industriesRow");
  container.innerHTML = "";

  const colSize = getColSize();          // 2 / 4 / 6 / 12
  const columnCount = (colSize == 2) ? 12 / colSize - 1 : 12 / colSize;      // 6 / 3 / 2 / 1

  const columnsData = distributeItems(products, columnCount);

  columnsData.forEach(columnItems => {
    container.innerHTML += `
      <div class="col-${colSize} p-md-0">
        <div class="project-wrapper h9-project-wrapper wow fadeInUp">
          <div class="swiper h9-project-slider overlay-none">
            <div class="swiper-wrapper">
              ${columnItems.map(item => `
                <div class="swiper-slide slider-anim">
                  <div class="project-item">
                    <div class="project-img">
                      <img src="${item.img}" alt="${item.title}">
                    </div>
                    <div class="project-content">
                      <div class="project-text">
                        <h5 class="title"><a href="">${item.title}</a></h5>
                      </div>
                    </div>
                  </div>
                </div>
              `).join("")}
            </div>
          </div>
        </div>
      </div>
    `;
  });

  new Swiper(".h9-project-slider", {
    slidesPerView: 1,
    loop: true,
    speed: 1500,
    centeredSlides: false,
    autoplay: {
      delay: 2000,
    },
  });
}

renderProducts();
window.addEventListener("resize", renderProducts);


/* Wizardawn's shared, reproducible random source. No browser state is required. */
(function (W) {
  'use strict';
  W.random = function (seed) {
    let state = 2166136261;
    for (const c of String(seed ?? Date.now())) state = Math.imul(state ^ c.charCodeAt(0), 16777619);
    function next() {
      state = (state + 0x6D2B79F5) | 0;
      let n = Math.imul(state ^ state >>> 15, 1 | state);
      n ^= n + Math.imul(n ^ n >>> 7, 61 | n);
      return ((n ^ n >>> 14) >>> 0) / 4294967296;
    }
    const int = (min, max) => Math.floor(next() * (max - min + 1)) + min;
    function d(sides) {
      if (!Number.isInteger(+sides) || sides < 1) throw new RangeError('Dice need a positive number of sides.');
      return int(1, +sides);
    }
    function roll(expression) {
      const match = /^\s*(\d*)d(\d+)(?:\s*([+-])\s*(\d+))?\s*$/i.exec(expression);
      if (!match) throw new Error('Use dice notation such as 3d6 or 2d8+1.');
      const count = +(match[1] || 1);
      if (count > 10000) throw new RangeError('Too many dice.');
      let sum = 0; for (let i = 0; i < count; i++) sum += d(+match[2]);
      return sum + (match[3] === '-' ? -1 : 1) * +(match[4] || 0);
    }
    return { next, int, d, roll, pick: values => {
      if (!values.length) throw new Error('Cannot pick from an empty table.');
      return values[int(0, values.length - 1)];
    }, chance: percent => d(100) <= percent };
  };
  W.rng = W.random();
  W.d = n => W.rng.d(n);
  W.roll = expression => W.rng.roll(expression);
  W.pick = values => W.rng.pick(values);
  W.shuffle = values => {
    const result = values.slice();
    for (let i = result.length - 1; i > 0; i--) {
      const j = W.rng.int(0, i);
      [result[i], result[j]] = [result[j], result[i]];
    }
    return result;
  };
  W.weighted = rows => {
    const total = rows.reduce((sum, row) => sum + row.weight, 0);
    let pick = W.rng.next() * total;
    for (const row of rows) { pick -= row.weight; if (pick < 0) return row.value; }
    return rows.at(-1).value;
  };
})(window.WZ = window.WZ || {});

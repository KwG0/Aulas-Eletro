/* Dados do Transformador

Potência aparente: S (Numero da chamada . 1000) VA;
Tensão de trabalho: V (Numero da chamada par - 220v impar - 230v) / 60hz;
Fator de potência: FP (cos fi = 0.5) (Indutivo);

Determine:

a- Potencia ativa (P1); (Watts)
b- Potência reativa (Q1); (Var)
c- Corrente total do circuito (it1) e a Impedância (Z1); (Ampere) (Ohm)
d- Capacitor (C) - FP > 0.92 (cos fi2); (Micro Farad)
e- Potência aparente (S2);
f- Corrente total do circuito (it2) e Impedância (Z2);
g- Potência reativa (Q2);
*/

const s1 = (19*1000);
const v = 230;
const cosFi1 = 0.5;
const pi = 3.14;

let p1 = s1 * cosFi1;
let q1 = Math.round(Math.sqrt((Math.pow(s1,2)- Math.pow(p1,2))));
let it1 = Math.round(s1 / v);
let z1 = Math.round(v/it1);

let c = p1/(2 * pi * 60 * Math.pow(v,2))*(1.7320-0.4244);
let cosFi2 = 0.92;
let s2 = Math.round(p1/0.92);
let q2 = Math.round(Math.sqrt((Math.pow(s2,2)- Math.pow(p1,2))));
let it2 = Math.round(s2/v);
let z2 = Math.round(v/it2);

console.log(s1,v,p1,q1,cosFi1,it1,z1,c,cosFi2,s2,q2,it2,z2);

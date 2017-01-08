package RSA.Algorytmy.Potegowanie;

import java.math.BigInteger;

import RSA.Algorytmy.MyStack;

public class ChinskieTwierdzenieOResztach implements IPotegowanieMod{

	/**
	 * Funkcja zwracajaca liczbe q = a^b mod m.
	 * @param a Liczba ktora podnosimy do potegi
	 * @param b O ile podnosimy do potegi
	 * @param m Modulo
	 * @return a^b mod m
	 */
	public BigInteger start(BigInteger a, BigInteger b, BigInteger m){
		MyStack stack = new MyStack(); //stos w ktory przetrzymywac bede obliczone potegi
		BigInteger last = a.mod(m); //zaczynamy od pierwszego, bo a^1 mod m = a mod m
		stack.push(last); //ladujemy to na stos jako element dla i = 1
		BigInteger i = new BigInteger("2"); //zaczynamy od tego, jakby b = 2, to i = 1 nam wystarczy
		while( i.compareTo(b) <= 0 ){ //petla po wszystkich wartosciach i=2^j<b gdzie j to iteracja
			last = (last.multiply(last)).mod(m); //bedziemy to ladowac do stosu
			i = i.shiftLeft(1); //kolejne i, czyli mnozymy dotychczasowe razy 2
			stack.push(last); //laduj na stos ostatniego lasta
		}
		BigInteger wynik = stack.pop(); //tutaj bedzie koncowy wynik
		i = i.shiftRight(1); //poszlismy o jedno i za duzo, trzeba wrocic
		b = b.subtract(i); //odejmij to, ktore wlozyles do wyniku od b
		i = i.shiftRight(1); //przejdz o jedno w prawo, jak w kazdej iteracji
		while( b.compareTo(BigInteger.ZERO) == 1 ){ //petla przebiegajaca az do wyzerowania b
			while( i.compareTo(b) == 1 ){ //szukaj odpowiedniego i
				i = i.shiftRight(1); //jak nie znalazles, zmniejsz i szukaj dalej
				stack.pop(); //no i zdejmij ze stosu
			}
			b = b.subtract(i); //znalazles odpowiednie i, odejmij je od b
			i = i.shiftRight(1); //przesun i
			wynik = (wynik.multiply(stack.pop())).mod(m); //pomnoz wynik
		}
		return wynik; //zwroc a^b mod m
	}
	
}

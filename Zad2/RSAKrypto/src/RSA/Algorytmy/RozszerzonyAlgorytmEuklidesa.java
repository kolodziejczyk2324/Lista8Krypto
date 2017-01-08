package RSA.Algorytmy;

import java.math.BigInteger;

public class RozszerzonyAlgorytmEuklidesa {

	/**
	 * Funkcja liczaca dla liczby a odwrotnosc modulo b.
	 * Czyli chcemy dajac a oraz b otrzymac takie x, ze
	 * x*a mod b = 1
	 * @param a Liczba ktorej odwrodnosc modulo b chcemy wyliczyb
	 * @param b Liczba bedaca liczba w modulo
	 * @return odwrotnosc modulo b liczby a
	 */
	public static BigInteger start(BigInteger a, BigInteger b){
		BigInteger u=new BigInteger("1"), w=new BigInteger(a.toString()); //poczatkowe wartosci wspolczynnikow
		BigInteger x=new BigInteger("0"), z=new BigInteger(b.toString());
		while( !w.equals(BigInteger.ZERO) ){ //w petli modyfikujemy wspolczynniki rownan
			if(w.compareTo(z) == -1){ //aby algorytm wyliczal nowe wspolczynniki to w nie moze byc mniejsze od z
				BigInteger temp = new BigInteger(u.toString()); //swapujemy rownania
				u = x;
				x = temp;
				temp = new BigInteger(w.toString());
				w = z;
				z = temp;
			}
			BigInteger q = w.divide(z); //obliczamy iloraz calkowity
			u = u.subtract(q.multiply(x)); //od rownania 1 odejmujemy rownanie 2 pomnozone przez q
			w = w.subtract(q.multiply(z));
		}
		if(!z.equals(BigInteger.ONE)) return null; //dla z != od 1 nie idzieje odwrotnosc modulo
		if(x.compareTo(BigInteger.ZERO) == -1) x = x.add(b); //ujemne x sprowadzamy do wartosci dodatnich
		return x; //x jest poszukiwana odwrotnoscia modulo
	}
	
}

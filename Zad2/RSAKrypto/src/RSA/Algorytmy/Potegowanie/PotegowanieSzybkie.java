package RSA.Algorytmy.Potegowanie;

import java.math.BigInteger;

public class PotegowanieSzybkie implements IPotegowanieMod {

	/**
	 * Jesli bit jest rowny 0 (liczac od prwej) porstawe nadpisujemy jej kwadratem
	 * Jesli bit jest rowny 1 wynik przemnazamy przez aktualna wartosc podstawy
	 * 		a podstawe nadpisujemy jej kwadratem.
	 */
	@Override
	public BigInteger start(BigInteger a, BigInteger b, BigInteger m) {
		BigInteger w = new BigInteger("1");
		BigInteger TWO = new BigInteger("2");
		while(b.compareTo(BigInteger.ZERO) == 1){
			if( (b.mod(TWO)).equals(BigInteger.ONE) ) //ostatni bit jest 1
					w = (w.multiply(a)).mod(m);
			a = a.multiply(a).mod(m);
			b = b.shiftRight(1); //skroc o jeden bit
		}
		return w;
	}

}

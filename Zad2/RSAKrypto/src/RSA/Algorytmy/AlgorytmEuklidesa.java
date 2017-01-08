package RSA.Algorytmy;

import java.math.BigInteger;
import java.util.Random;

public class AlgorytmEuklidesa {

	/**
	 * Funkcja obliczajaca losowa liczbe b mniejsza od a taka ze NWD(a,b)=1
	 * @param a Liczba dla ktorej chcemy znalezc liczbe wzglednie pierwsza
	 * @return Losowa liczba wzglednie pierwsza mniejsza od a
	 */
	public static BigInteger start(BigInteger a){
		Random rand = new Random();
		BigInteger b = new BigInteger("0"); //liczba losowa nie wieksza niz a
		while( !NWD(a, b = new BigInteger(a.bitLength(), rand)).equals(BigInteger.ONE) ); //szukamy liczby b takiej ze NWD(a,b)== 1
		return b;
	}
	
	/**
	 * Algorytm oblicza NWD liczb a, oraz b.
	 * @param a Pierwsza liczba
	 * @param b Druga liczba
	 * @return najwiekszy wspolny dzielnik liczb a i b
	 */
	public static BigInteger NWD(BigInteger a, BigInteger b){
		while(!b.equals(BigInteger.ZERO)){
			BigInteger t = new BigInteger(b.toString()); //zapamietujemy dzielnik
			b = a.mod(b); //wyznaczamy reszte z dzielenia, ktora staje sie dzielnikiem
			a = new BigInteger(t.toString()); //poprzedni dzielnik staje sie teraz dzielna
		}
		return a;
	}
	
}

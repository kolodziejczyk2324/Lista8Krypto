package RSA;

import java.util.Random;

/**
 * Klasa majaca za zadanie generowanie losowych liczb pierwszych.
 * @author Kemer
 */
public class PrimeGenerator {
	/**
	 * Generuje losowa liczbe pierwsza z zakresu 'zakres'
	 * @param zakres Prawy koniec zakresu w ktorym losowane maja byc liczby pierwsze
	 * @return Losowa liczba pierwsza z podanego zakresu
	 */
	public static int generateRandomPrimeNumber(int zakres){
		int num; //zmienna w ktorej przetrzymywac bedziemy aktualnie wylosowana zmienna
		int min = (int) (0.8*zakres); //minimalna liczba jaka mozemy wylosowac
		int los = zakres - min; //przedzial liczb z ktorego losujemy
		Random rand = new Random(); //maszynka do losowania
		while (!isPrime(num = min + rand.nextInt(los))); //szukamy liczby pierwszej
		return num; //zwroc liczbe pierwsza
	}
	
	/**
	 * Funkcja majaca za zadanie sprawdzic czy podana liczba jest pierwsza.
	 * @param inputNum Liczba ktora mamy sprawdzic
	 * @return True - liczba jest pierwsza, false - jest zlozona
	 */
	private static boolean isPrime(int inputNum){
        if (inputNum <= 3 || inputNum % 2 == 0) //sprwdzenie czy podana liczba to 2 lub 3
            return inputNum == 2 || inputNum == 3; //tylko 2 lub 3 z tego zakresu jest ok
        int divisor = 3; //przez 2 sie nie dzieli, sprawdzamy niepatrzyste
        while ((divisor <= Math.sqrt(inputNum)) && (inputNum % divisor != 0)) //lecimy do pierwiastka (jezeli wyszloby podzielne to wychodzimy)
            divisor += 2; //przez 2 sie nie dzieli, sprawdzamy nieparzyste
        return inputNum % divisor != 0; //ostateczne sprawdzenie
    }
}

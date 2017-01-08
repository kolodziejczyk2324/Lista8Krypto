package MainPackage;

import java.util.Scanner;

import RSA.*;
import RSA.RSA.Keys;
import RSA.Algorytmy.Potegowanie.*;

public class StartClass {

	public static void main(String[] args) {
		test(new ChinskieTwierdzenieOResztach());
		test(new PotegowanieSzybkie());
	}
	
	/**
	 * Test ktory czyta String z klawiatury, generuje klucze, zaszyfrowuje tekst, wypisuje go, odszyfrowuje, wypisuje odszyfrowany.
	 * @param potegowanie Obiekt implementujacy interfejs IPotegowanieMod ktory wykonuje potegowanie modulo
	 */
	public static void test(IPotegowanieMod potegowanie){
		System.out.println("Podaj tekst jaki mam zakodowac: ");
		String message = new Scanner(System.in).nextLine();
		RSA rsa = new RSA();
		Keys keys = rsa.generateKeys();
		String crypt = rsa.encrypt(message, keys.pubKey, potegowanie);
		System.out.println("Udalo mi sie zakodowac, Twoj kryptogram to:\n"+crypt);
		String dec = rsa.decrypt(crypt, keys.privKey, potegowanie);
		System.out.println("Odkodujmy:\n"+dec);
	}
		

}

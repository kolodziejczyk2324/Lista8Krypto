package RSA;

import java.math.BigInteger;
import java.security.SecureRandom;

import RSA.Algorytmy.AlgorytmEuklidesa;
import RSA.Algorytmy.RozszerzonyAlgorytmEuklidesa;
import RSA.Algorytmy.Potegowanie.IPotegowanieMod;

public class RSA {
	
	int bitlen = 1024;
	
	/**
	 * Klasa opakowujaca wszystkie klucze, ktore zwraca funkcja keyGenerator
	 * @author Kemer
	 */
	public class Keys{
		public PublicKey pubKey;
		public PrivateKey privKey;
		
		Keys(PublicKey pubKey, PrivateKey privKey){
			this.pubKey = pubKey;
			this.privKey = privKey;
		}
	}
	
	public class PublicKey{
		public BigInteger e; //publiczny wykladnik
		public BigInteger n; //p*q
		
		PublicKey(BigInteger e, BigInteger n){
			this.e = e;
			this.n = n;
		}
	}
	
	public class PrivateKey{
		public BigInteger d; //prywatny wykladnik
		public BigInteger n; //p*q
		
		PrivateKey(BigInteger d, BigInteger n){
			this.d = d;
			this.n = n;
		}
	}
	
	/**
	 * Algorytm generujacy klucze publiczny i prywatny.
	 * @param zakres Zakres z jakiego maja byc generowane zmienne p i q
	 * @return klasa zawierajaca klucze publiczny i prywatny
	 */
	public Keys generateKeys(){
		SecureRandom r = new SecureRandom();
		BigInteger p = new BigInteger(bitlen / 2, 100, r);
		BigInteger q = new BigInteger(bitlen / 2, 100, r);
		BigInteger fi = (p.subtract(BigInteger.ONE)).multiply(q.subtract(BigInteger.ONE));
		BigInteger n = p.multiply(q);
		BigInteger e = AlgorytmEuklidesa.start(fi);
		BigInteger d = RozszerzonyAlgorytmEuklidesa.start(e, fi);
		return new Keys(new PublicKey(e, n), new PrivateKey(d, n));
	}
	
	public String encrypt(String str, PublicKey pubKey, IPotegowanieMod potegowanie){
		return potegowanie.start(new BigInteger(str.getBytes()), pubKey.e, pubKey.n).toString();
	}
	
	public String decrypt(String str, PrivateKey privKey, IPotegowanieMod potegowanie){
		return new String(potegowanie.start(new BigInteger(str), privKey.d, privKey.n).toByteArray());
	}
}

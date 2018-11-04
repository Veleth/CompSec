import java.io.UnsupportedEncodingException;
import java.security.InvalidAlgorithmParameterException;
import java.security.InvalidKeyException;
import java.security.NoSuchAlgorithmException;
import java.security.NoSuchProviderException;
import java.util.Date;
import javax.crypto.NoSuchPaddingException;

public class Main {


    public static void main(String[] args) throws NoSuchAlgorithmException, NoSuchPaddingException, UnsupportedEncodingException, InvalidKeyException, InvalidAlgorithmParameterException, NoSuchProviderException{

        int n=16;
        Runnable[] decrypts = new Runnable[n];
        Thread[] threads = new Thread[n];

        System.out.println("Start: "+new Date());
        for(int i = 0; i < n; ++i){
            decrypts[i] = new Decrypt();
            threads[i] = new Thread(decrypts[i], Integer.toString(i));
            threads[i].start();
        }
    }
}
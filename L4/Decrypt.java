import java.awt.Toolkit;
import java.security.InvalidAlgorithmParameterException;
import java.security.InvalidKeyException;
import java.util.Base64;
import java.util.Base64.Decoder;
import java.util.Date;

import javax.crypto.Cipher;
import javax.crypto.spec.IvParameterSpec;
import javax.crypto.spec.SecretKeySpec;

public class Decrypt implements Runnable{

    byte[] iv = IV("910f58817778f9e71e32868f691ab07f");
    String b64 = "14eUfMVAqgjDGqB+m6SdSnnl/h1kxjcHzFj7BPqTdkxtSOjMBQcLQuv+bEw1a/AGC9CHJ1EHxiZejNcbPvjp7UOm0fb0HVXf5t+ZqRfG0JEYaJFeLAhzV1spWHXKJk2PZGLO+WOinJJCr+jJkYZJfDriFET3pUyQ9HybI8upHyGnH3k5fuqtgu68EqA+Ioa/snmWidUQQfRV+slsIpIo0n0xhvIjbC8jDWNY4xm1gLlAFtq1cqZkdw7U63Lzu7Vh";
    String keysuff = "23ce472eef7920d21db153b32188a606fd2d827967c5ee2d2e457b43";
    Decoder dec = Base64.getDecoder();
    byte[] decoded = dec.decode(b64.getBytes());
    IvParameterSpec ivs = new IvParameterSpec(iv);
    Cipher c;

    public void decodeMsg(String key) throws InvalidKeyException, InvalidAlgorithmParameterException{

        byte[] kv = hexStringToByteArray(key);
        SecretKeySpec sks = new SecretKeySpec(kv, "AES");
        c.init(Cipher.DECRYPT_MODE, sks, ivs);
        byte[] end = c.update(decoded);
        if(check(end)){
            Toolkit.getDefaultToolkit().beep();
            printb(end);
            System.out.println("\n"+new Date()+" Message found for key: " + key);
        }

    }

    public byte[] hexStringToByteArray(String s) {
        int len = s.length();
        byte[] data = new byte[len / 2];
        for (int i = 0; i < len; i += 2) {
            data[i / 2] = (byte) ((Character.digit(s.charAt(i), 16) << 4)
                    + Character.digit(s.charAt(i+1), 16));
        }
        return data;
    }

    private boolean check(byte[] end) {
        int max = end.length >> 4;
        int counter = 0;
        for(int i = 0; i < end.length; ++i){
            if(end[i] > 0)
                continue;
            else if (counter > max)
                return false;
            else
                counter++;
        }
        return true;
    }

    public void printb(byte[] b){
        for(int i = 0; i < b.length; ++i){
            System.out.print((char)b[i] + " ");
        }
    }

    private byte[] IV(String iv){
        byte[] result = new byte[iv.length() / 2];
        for(int i = 0; i < result.length; ++i){
            result[i] = (byte) Integer.parseInt(iv.substring(2*i, 2*i + 2) , 16);
        }
        return result;
    }

    public String formatHex(String s, int len) {
        if (s.length()>len) {
            return s;
        }
        while(s.length() < len) {
            s = "0" + s;
        }
        return s;
    }

    @Override
    public void run() {
        int id = Integer.parseInt(Thread.currentThread().getName());
        try {
            c = Cipher.getInstance("AES/CBC/PKCS5Padding");
        } catch (Exception e2) {
            e2.printStackTrace();
        }

        int len = 64-keysuff.length();
        System.out.println("Thread nr " + id +  " started");
        for (long x = 0; x < Math.pow(16, len-1)-1; x ++){
                String key = Integer.toHexString(id) + formatHex(Long.toHexString(x), len-1) + keysuff;
                try {
                    decodeMsg(key);
                }
                catch (Exception e1) {
                    e1.printStackTrace();
                }
        }
    }
}
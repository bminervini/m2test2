import io.github.bonigarcia.wdm.FirefoxDriverManager;
import org.jsoup.helper.Validate;
import org.junit.After;
import org.junit.Before;
import org.junit.Test;
import org.openqa.selenium.*;
import org.openqa.selenium.firefox.FirefoxDriver;

import java.util.concurrent.TimeUnit;
import java.util.logging.Level;

import static org.jsoup.helper.Validate.fail;
import static org.junit.Assert.assertEquals;
import static org.junit.Assert.fail;

public class TF1 {
    private WebDriver driver;
    private String baseUrl;
    private boolean acceptNextAlert = true;
    private StringBuffer verificationErrors = new StringBuffer();
    @Before
    public void setUp() throws Exception {
        java.util.logging.Logger.getLogger("com.gargoylesoftware")
                .setLevel(Level.OFF);
        System.setProperty("org.apache.commons.logging.Log",
                "org.apache.commons.logging.impl.NoOpLog");
        driver = new FirefoxDriver();
        FirefoxDriverManager.getInstance().setup();

        baseUrl = "https://www.katalon.com/";
        driver.manage().timeouts().implicitlyWait(30, TimeUnit.SECONDS);
    }

    @Test
    public void testTF1() throws Exception {
        driver.get("https://disc.univ-fcomte.fr/m2gl-webRobot/Accueil.php?seed=1");
        driver.findElement(By.id("newCarte")).click();
        driver.findElement(By.linkText("Tourner gauche")).click();
        driver.findElement(By.linkText("Avancer")).click();
        driver.findElement(By.linkText("Avancer")).click();
        driver.findElement(By.linkText("Avancer")).click();
        driver.findElement(By.linkText("Tourner droite")).click();
        driver.findElement(By.linkText("Avancer")).click();
        driver.findElement(By.linkText("Avancer")).click();
        driver.findElement(By.linkText("Reculer")).click();
        assertEquals("6", driver.findElement(By.id("energy")).getText());
    }

    @After
    public void tearDown() throws Exception {
        driver.quit();
        String verificationErrorString = verificationErrors.toString();
        if (!"".equals(verificationErrorString)) {
            Validate.fail(verificationErrorString);
        }
    }

    private boolean isElementPresent(By by) {
        try {
            driver.findElement(by);
            return true;
        } catch (NoSuchElementException e) {
            return false;
        }
    }

    private boolean isAlertPresent() {
        try {
            driver.switchTo().alert();
            return true;
        } catch (NoAlertPresentException e) {
            return false;
        }
    }

    private String closeAlertAndGetItsText() {
        try {
            Alert alert = driver.switchTo().alert();
            String alertText = alert.getText();
            if (acceptNextAlert) {
                alert.accept();
            } else {
                alert.dismiss();
            }
            return alertText;
        } finally {
            acceptNextAlert = true;
        }
    }
}

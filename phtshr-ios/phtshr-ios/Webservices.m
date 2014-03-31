//
//  Webservices.m
//  phtshr-ios
//
//  Created by David Lafrance on 2014-03-30.
//  Copyright (c) 2014 David Lafrance. All rights reserved.
//

#import "Webservices.h"
#import "AppUser.h"
#import <CommonCrypto/CommonDigest.h>

@implementation Webservices

+ (NSString *) createSHA512:(NSString *)source {
    
    const char *s = [source cStringUsingEncoding:NSASCIIStringEncoding];
    
    NSData *keyData = [NSData dataWithBytes:s length:strlen(s)];
    
    uint8_t digest[CC_SHA512_DIGEST_LENGTH] = {0};
    
    CC_SHA512(keyData.bytes, keyData.length, digest);
    
    NSData *out = [NSData dataWithBytes:digest length:CC_SHA512_DIGEST_LENGTH];
    
    
    const unsigned char *bytes = (const unsigned char*)[out bytes];
    NSUInteger nbBytes = [out length];
    static const NSUInteger spaceDelay = 4UL;
    NSUInteger strLen = 2 * nbBytes + nbBytes / spaceDelay;
    
    NSMutableString *hex = [[NSMutableString alloc] initWithCapacity:strLen];
    for (NSUInteger i = 0; i < nbBytes; ) {
        [hex appendFormat:@"%02X", bytes[i]];
        ++i;
    }
    
    return [hex lowercaseString];
}

+(AppUser *) login:(NSString *)_username withPassword:(NSString *)_passwd {
    NSString *post = [[NSString alloc] initWithFormat:@"username=%@&passwd=%@", _username, [Webservices createSHA512:_passwd]];
    NSData *postData = [post dataUsingEncoding:NSUTF8StringEncoding allowLossyConversion:YES];
    NSString *postLength = [NSString stringWithFormat:@"%lu", (unsigned long)[postData length]];
    NSMutableURLRequest *request = [[NSMutableURLRequest alloc] initWithURL:[NSURL URLWithString:@"http://local.photoz.com/webservices/login.php"]];
    [request setHTTPMethod:@"POST"];
    [request setValue:postLength forHTTPHeaderField:@"Content-length"];
    [request setHTTPBody:postData];
    
    NSError *error = [[NSError alloc] init];
    NSHTTPURLResponse *response = nil;
    NSData *urlData = [NSURLConnection sendSynchronousRequest:request returningResponse:&response error:&error];
    AppUser *user = nil;
    
    if ([response statusCode] >= 200 && [response statusCode] < 300) {
        NSDictionary *responseData = [NSJSONSerialization JSONObjectWithData:urlData options:NSJSONReadingMutableContainers error:&error];
        if ([[responseData objectForKey:@"success"] boolValue] == YES) {
            NSDictionary *userdata = [responseData objectForKey:@"App_User"];
            user = [AppUser new];
            user.u_id = [[userdata objectForKey:@"u_id"] intValue];
            user.lastName = [userdata objectForKey:@"u_last_name"];
            user.firstName = [userdata objectForKey:@"u_first_name"];
            user.email = [userdata objectForKey:@"u_email"];
            NSData *imageData = [[NSData alloc] initWithContentsOfURL:[NSURL URLWithString:[userdata objectForKey:@"u_profile_picture"]]];
            user.profilePicture = [[UIImage alloc] initWithData:imageData];
            user.passwd = [userdata objectForKey:@"u_password"];
            user.salt = [userdata objectForKey:@"u_salt"];
        } else {
            NSLog(@"Error : %@", [responseData objectForKey:@"info"]);
        }
    } else if (error) {
        NSLog(@"Error : %@", error);
    }
    
    return user;
}

+(NSMutableArray *) getPhotoFeed {
    return [Webservices getPhotoFeedWithUserId:0];
}

+(NSMutableArray *) getPhotoFeedWithUserId:(NSInteger)_userId {
    NSString *urlString = [[NSString alloc] initWithFormat:@"http://local.photoz.com/webservices/photoFeed.php?user_id=%ld", (long)_userId];
    NSMutableURLRequest *request = [[NSMutableURLRequest alloc] initWithURL:[NSURL URLWithString:urlString]];
    
    NSError *error = [[NSError alloc] init];
    NSHTTPURLResponse *response = nil;
    NSData *urlData = [NSURLConnection sendSynchronousRequest:request returningResponse:&response error:&error];
    
    NSMutableArray *photoFeed = [[NSMutableArray alloc] init];
    
    if ([response statusCode] >= 200 && [response statusCode] < 300) {
        NSArray *jsonResponse = [NSJSONSerialization JSONObjectWithData:urlData options:NSJSONReadingMutableContainers error:&error];
        for (NSInteger i = 0; i < [jsonResponse count]; ++i) {
            MyPhoto *currPhoto = [[MyPhoto alloc] initWithId:[[jsonResponse[i] objectForKey:@"p_id"] intValue] withSource:[jsonResponse[i] objectForKey:@"p_url"] withDescription:[jsonResponse[i] objectForKey:@"p_description"]];
            [photoFeed addObject:currPhoto];
        }
    } else {
        NSLog(@"Error : %@", error);
    }
    
    return photoFeed;
}

+(NSMutableArray *) getPhotoFeedWithTags:(NSString *)_tags {
    NSString *urlString = [[NSString alloc] initWithFormat:@"http://local.photoz.com/webservices/photoFeed.php?p_tags=%@", _tags];
    NSMutableURLRequest *request = [[NSMutableURLRequest alloc] initWithURL:[NSURL URLWithString:urlString]];
    
    NSError *error = [[NSError alloc] init];
    NSHTTPURLResponse *response = nil;
    NSData *urlData = [NSURLConnection sendSynchronousRequest:request returningResponse:&response error:&error];
    
    NSMutableArray *photoFeed = [[NSMutableArray alloc] init];
    
    if ([response statusCode] >= 200 && [response statusCode] < 300) {
        NSArray *jsonResponse = [NSJSONSerialization JSONObjectWithData:urlData options:NSJSONReadingMutableContainers error:&error];
        for (NSInteger i = 0; i < [jsonResponse count]; ++i) {
            MyPhoto *currPhoto = [[MyPhoto alloc] initWithId:[[jsonResponse[i] objectForKey:@"p_id"] intValue] withSource:[jsonResponse[i] objectForKey:@"p_url"] withDescription:[jsonResponse[i] objectForKey:@"p_description"]];
            [photoFeed addObject:currPhoto];
        }
    } else {
        NSLog(@"Error : %@", error);
    }
    
    return photoFeed;
}

@end

//
//  Webservices.h
//  phtshr-ios
//
//  Created by David Lafrance on 2014-03-30.
//  Copyright (c) 2014 David Lafrance. All rights reserved.
//

#import <Foundation/Foundation.h>
#import "AppUser.h"

@interface Webservices : NSObject

+(NSString *) createSHA512:(NSString *)source;
+(AppUser *) login:(NSString *)_username withPassword:(NSString *)_passwd;
+(NSMutableArray *) getPhotoFeed;
+(NSMutableArray *) getPhotoFeedWithUserId:(NSInteger)_userId;
+(NSMutableArray *) getPhotoFeedWithTags:(NSString *)_tags;

@end
